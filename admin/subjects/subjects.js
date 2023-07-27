/* For Pagination */
let currentPage = 1;
let totalPages = 1;

/*********************/

/* For Filter */
function changeContent(item) {
    document.getElementById('dropdownMenuButton').innerHTML = item;
    $('#searchInput').val("");
}

/*********************/

var message;

/* Check if all fields are filled before submitting the form */
function validateSubmit() {
    var subject_code = document.getElementById('subject_code').value.trim();
    var subject_name = document.getElementById('subject_name').value.trim();
    var date_added = document.getElementById('date_added').value;
    var class_level = document.getElementById('classLevel').value.trim();
    var selectedCourseId = document.getElementById('selected_course_id').value;
    var status = document.getElementsByName('status');

    // For Radio Buttons
    var selectedStatus = false;
        for (var i = 0; i < status.length; i++) {
            if (status[i].checked) {
                selectedStatus = true;
            break;
        }
    }

    // Check if the input value is not empty
    if(selectedCourseId === '') {
        message = "Choose a course among the list."
        return false;
    } else if (class_level !== '' && subject_code !== '' && subject_name !== '' && selectedStatus !== false && date_added !== '') {
        return true;
    } else {
        message = "Please answer all fields."
        return false;
    }
}

/*********************/

/* Add Data */
function submitForm() {
    //for modal
    event.preventDefault();
    $('.modal-body').css('opacity', '0.5');
    $('.submit').prop('disabled', true);

    if (validateSubmit()) {
        // data
        var code = $('#subject_code').val();
        code = code.toUpperCase();
        var name = $('#subject_name').val();
        var course = $('#selected_course_id').val();
        var date = $('#date_added').val();
        var class_level = $('#classLevel').val();
        const statusRadio = document.querySelectorAll('[name="status"]');

        // For Radio Buttons
        let status;
        for (const radioButton of statusRadio) {
            if (radioButton.checked) {
                status = radioButton.value;
                break;
            }
        }

        $.ajax ({
            url: "create.php",
            type: 'POST',
            data: {
                code: code,
                name: name,
                course: course,
                date: date,
                class_level: class_level,
                status: status,
            },
            success: function(response){
                document.getElementById('dropdownMenuButton').innerHTML = "Status";

                alert(response);

                $('.modal-body').css('opacity', '');
                $('.submit').prop('disabled', false);
                $("#CreateSubject").modal("hide");
                $("#form")[0].reset();  
                loadTableData(totalPages);
            },
            error: function (error) {
                alert("Error occurred: " + error.statusText);
            }
        });
    } else {
        alert(message);
        $('.modal-body').css('opacity', '');
        $('.submit').prop('disabled', false);
    }
}

/*********************/

/* Check if all fields are filled before updating the form */
function validateUpdate() {
    var subject_code = document.getElementById('update_subject_code').value.trim();
    var subject_name = document.getElementById('update_subject_name').value.trim();
    var course_id = document.getElementById('update_courseInput').value;
    var selectedCourseId = document.getElementById('update_course_id').value;
    var date_added = document.getElementById('update_date_added').value;
    var class_level = document.getElementById('update_classLevel').value.trim();
    var status = document.getElementsByName('status');
  
    // For Radio Buttons
    var selectedStatus = false;
        for (var i = 0; i < status.length; i++) {
            if (status[i].checked) {
                selectedStatus = true;
            break;
        }
    }

    // Check if the input value is not empty
    if(selectedCourseId === '') {
        message = "Choose a course among the list."
        return false;
    } else if (class_level !== '' && course_id !== '' && subject_code !== '' && subject_name !== '' && selectedStatus !== false && date_added !== '') {
        return true;
    } else {
        message = "Please answer all fields."
        return false;
    }
}

/*********************/

/* Update Data */
function showDetails(id) {
    $('#hidden_data').val(id);
    var level_name;

    $.post("update.php", { id: id }, function (data, status) {
        var subjectData = JSON.parse(data);

        $('#update_subject_code').val(subjectData.subject_code);
        $('#update_subject_name').val(subjectData.subject_name);
        $('#update_course_id').val(subjectData.course_id);
        $('#update_date_added').val(subjectData.date_added);

        // Assign level code
        switch(subjectData.class_id){
            case 1: level_name = 'Nursery'; break;
            case 2: level_name = 'Kindergarten 1'; break;
            case 3: level_name = 'Kindergarten 2'; break;
        }

        $('#update_classLevel').val(level_name);

        // Retrieve the course_name and course_code using the course_id
        $.post("retrieve_course.php", { course_id: subjectData.course_id }, function (courseData, status) {
            var courseInfo = JSON.parse(courseData);
            $('#update_courseInput').val(courseInfo.course_code + " - " + courseInfo.name);
        });

        if (subjectData.status === "Active") {
            $('#update_active').prop('checked', true);
        } else if (subjectData.status === "Archive") {
            $('#update_archive').prop('checked', true);
        }

        // Show the modal after populating the data
        $("#EditSubject").modal("show");

        loadTableData(currentPage);
        document.getElementById('dropdownMenuButton').innerHTML = "Status";
    });
}

function updateForm(){
    // for modal
    event.preventDefault();
    $('.modal-body').css('opacity', '0.5');
    $('.update').prop('disabled', true);

    if (validateUpdate()) {
        var update_code = $('#update_subject_code').val();
        update_code = update_code.toUpperCase();
        var update_name = $('#update_subject_name').val();
        var update_course = $('#update_course_id').val();
        var update_date = $('#update_date_added').val();
        var update_classLevel = $('#update_classLevel').val();
        var hidden_data = $('#hidden_data').val();
        const update_statusRadio = document.querySelectorAll('[name="status"]');

        // Loop through the radio buttons to find the selected one
        let update_status;
        for (const radioButton of update_statusRadio) {
            if (radioButton.checked) {
                update_status = radioButton.value;
                break;
            }
        }

        $.post("update.php", {
            update_code: update_code,
            update_name: update_name,
            update_date: update_date,
            update_course: update_course,
            update_status: update_status,
            update_classLevel: update_classLevel,
            hidden_data: hidden_data
        }, function(response){
                alert(response);

                // for modal
                $('.modal-body').css('opacity', '');
                $('.update').prop('disabled', false);
                $("#EditSubject").modal("hide");
                $("#form")[0].reset();

                loadTableData(currentPage);
                document.getElementById('dropdownMenuButton').innerHTML = "Status";
        });
    } else {
        alert(message);
        $('.modal-body').css('opacity', '');
        $('.update').prop('disabled', false);
    }
}

/*********************/

/* load table data based on page number, search input, and filter status */
function loadTableData(pageNumber, searchInput = "", filterStatus = "") {
    $.ajax({
        url: 'read.php',
        method: 'GET',
        data: {
            page: pageNumber,
            search_input: searchInput,
            filter_status: filterStatus
        },
        dataType: 'json',
        success: function(data) {
            // Clear the table and pagination
            $('#table_data').empty();
            $('#pagination').empty();
            $('#total_count').text(`You have a total of ${data.total_records} subjects.`);

            // Loop through the data and append rows to the table
            $.each(data.records, function(index, item) {
                const dateAdded = new Date(item.date_added);
                const year = dateAdded.getFullYear();

                const row = `<tr>
                    <td>${item.num}</td>
                    <td>${item.subject_code}</td>
                    <td>${item.subject_name}</td>
                    <td>${year} - ${year + 1}</td>
                    <td>${item.status}</td>
                    <td>
                        <a href="#" class="btn btn-sm rounded" onClick="showDetails(${item.id});">
                            <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                        </a>
                    </td>
                </tr>`;
                $('#table_data').append(row);
            });

            // Modify the URL without reloading the page
            history.pushState(null, null, `?page=${pageNumber}`);

            // Generate pagination links
            currentPage = data.page;
            totalPages = data.total_pages;
            $('#pagination').empty();

            for (let i = 1; i <= totalPages; i++) {
                const liClass = i === currentPage ? 'page-item active' : 'page-item';
                const link = `<a class="page-link" href="#" onclick="loadTableData(${i}, '${searchInput}', '${filterStatus}')">${i}</a>`;
                const li = `<li class="${liClass}">${link}</li>`;
                $('#pagination').append(li);
            }

            if (data.records.length === 0) {
                const noRecordsRow = '<tr><td colspan="6">No entries found.</td></tr>';
                $('#table_data').append(noRecordsRow);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', errorThrown);
        }
    });
}

/*********************/

// Filter courses available
function fetchFilteredCourses(courseInput = null, dropdownMenuId, selectedCourseIdField, courseButtonId) {
    var xhr = new XMLHttpRequest();
    var url = 'course_id.php';

    // If a courseInput is provided, modify the URL to include the search input
    if (courseInput !== null) {
        url += '?search_input=' + encodeURIComponent(courseInput);
    }

    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var courses = JSON.parse(xhr.responseText);

                // Build the dropdown options
                var dropdownMenu = document.getElementById(dropdownMenuId);
                dropdownMenu.innerHTML = ''; // Clear previous options

                for (var i = 0; i < courses.length; i++) {
                    var option = document.createElement('a');
                    option.classList.add('dropdown-item');
                    option.href = '#';
                    option.setAttribute('data-id', courses[i].id);
                    option.innerText = courses[i].code + " - " + courses[i].name;

                    option.addEventListener('click', function() {
                        // Set the selected course ID in the hidden input field
                        var selectedCourseId = this.getAttribute('data-id');
                        document.getElementById(selectedCourseIdField).value = selectedCourseId;

                        // Update the dropdown button text to the selected course name
                        var courseButton = document.getElementById(courseButtonId);
                        courseButton.value = this.innerText;
                    });

                    dropdownMenu.appendChild(option);
                }
            } else {
                console.log('Error: Could not fetch courses.');
            }
        }
    };

    xhr.send();
}

/*********************/

/* Load upon opening */
$(document).ready(function() {
    // Initial load of first page
    loadTableData(1);

    // Handle the search input
    $('#searchInput').keyup(function() {
        var input = $(this).val();
        document.getElementById('dropdownMenuButton').innerHTML = "Status";
        var filterStatus = document.getElementById('dropdownMenuButton').innerHTML;
    
        if (input === "") {
            loadTableData(1);
        } else {
            loadTableData(1, input, filterStatus);
        }
    });

    // Filter based on the status
    $('.dropdown-item').on('click', function() {
        var status = $(this).text();
        loadTableData(1, "", status);
    });

    // Handle the course input in modal
    $('#courseInput').on('input click', function() {
        $('#selected_course_id').val('');
        var courseInput = $(this).val();
        fetchFilteredCourses(courseInput, 'courseToggleButtons', 'selected_course_id', 'courseInput');
    });

    // Handle the update course input in modal
    $('#update_courseInput').on('input click', function() {
        $('#update_course_id').val('');
        var update_courseInput = $(this).val();
        fetchFilteredCourses(update_courseInput, 'update_courseToggleButtons', 'update_course_id', 'update_courseInput');
    });

});
