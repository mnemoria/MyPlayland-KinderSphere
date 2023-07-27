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
    var class_name = document.getElementById('className').value.trim();
    var class_level = document.getElementById('classLevel').value.trim();
    var selectedTeacherId = document.getElementById('selected_teacher_id').value;
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
    if(selectedTeacherId === '') {
        message = "Choose a teacher among the list."
        return false;
    } else if (class_name !== '' && class_level !== '' && selectedStatus !== false) {
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
        var class_name = $('#className').val();
        var class_level = $('#classLevel').val();
        var teacher = $('#selected_teacher_id').val();
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
                class_name: class_name,
                class_level: class_level,
                teacher: teacher,
                status: status,
            },
            success: function(response){
                loadTableData(totalPages);
                document.getElementById('dropdownMenuButton').innerHTML = "Status";

                alert(response);

                $('.modal-body').css('opacity', '');
                $('.submit').prop('disabled', false);
                $("#CreateClass").modal("hide");
                $("#form")[0].reset();  
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
    var class_name = document.getElementById('update_className').value.trim();
    var class_level = document.getElementById('update_classLevel').value.trim();
    var selectedTeacherId = document.getElementById('update_selected_teacher_id').value;
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
    if(selectedTeacherId === '') {
        message = "Choose a teacher among the list."
        return false;
    } else if (class_name !== '' && class_level !== '' && selectedStatus !== false) {
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

    $.post("update.php", { id: id }, function (data, status) {
        var teacherData = JSON.parse(data);

        $('#update_className').val(teacherData.class_name);
        $('#update_classLevel').val(teacherData.class_level);
        $('#update_selected_teacher_id').val(teacherData.teacher_id);

        // Retrieve the teacher name using the teacher_id
        $.post("retrieve_teacher.php", { teacher_id: teacherData.teacher_id }, function (teacherData, status) {
            var teacherInfo = JSON.parse(teacherData);
            $('#update_teacherInput').val(teacherInfo.firstname + " " + teacherInfo.lastname);
        });

        if (teacherData.status === "Active") {
            $('#update_active').prop('checked', true);
        } else if (teacherData.status === "Archive") {
            $('#update_archive').prop('checked', true);
        }

        // Show the modal after populating the data
        $("#EditClass").modal("show");

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
        var update_className = $('#update_className').val();
        var update_classLevel = $('#update_classLevel').val();
        var update_teacher_id = $('#update_selected_teacher_id').val();
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
            update_className: update_className,
            update_classLevel: update_classLevel,
            update_teacher_id: update_teacher_id,
            update_status: update_status,
            hidden_data: hidden_data
        }, function(response){
                alert(response);

                // for modal
                $('.modal-body').css('opacity', '');
                $('.update').prop('disabled', false);
                $("#EditClass").modal("hide");
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
    const currentYear = new Date().getFullYear();

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
            $('#total_count').text(`You have a total of ${data.total_records} classes.`);

            // An array to store all the AJAX calls
            var ajaxCalls = [];

            $.each(data.records, function(index, item) {
                // Retrieve the teacher name using the teacher_id
                var ajaxCall = $.post("retrieve_teacher.php", { teacher_id: item.teacher_id });
                ajaxCalls.push(ajaxCall);
            });

            $.when.apply($, ajaxCalls).then(function() {
                // Process the results when all AJAX calls are done
                var responses = arguments.length === 3 ? [arguments] : arguments;
                var teacherNames = [];
            
                // Convert the arguments object to an array
                var responseArray = Array.from(responses);
            
                responseArray.forEach(function(response) {
                    try {
                        var parsedResponse = JSON.parse(response[0]);
                        teacherNames.push(parsedResponse);
                    } catch (error) {
                        console.error("Error parsing JSON response for teacher:", error);
                        teacherNames.push(null);
                    }
                });
            
                // Clear the table before appending rows
                $('#table_data').empty();
            
                if (data.records.length === 1) {
                    var item = data.records[0];
                    var teacherInfo = teacherNames[0];
                    var teacherName = teacherInfo ? teacherInfo.firstname + " " + teacherInfo.lastname : "Unknown Teacher";

                    const row = `<tr>
                        <td>${item.num}</td>
                        <td>${item.class_name}</td>
                        <td>${item.class_level}</td>
                        <td>${teacherName}</td>
                        <td>${currentYear} - ${currentYear + 1}</td>
                        <td>${item.status}</td>
                        <td>
                            <a href="#" class="btn btn-sm rounded" onClick="showDetails(${item.id});">
                                <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                            </a>
                        </td>
                    </tr>`;
                    $('#table_data').append(row);
                } else {
                    $.each(data.records, function(index, item) {
                        var teacherInfo = teacherNames[index];
                        var teacherName = teacherInfo ? teacherInfo.firstname + " " + teacherInfo.lastname : "Unknown Teacher";
            
                        const row = `<tr>
                            <td>${item.num}</td>
                            <td>${item.class_name}</td>
                            <td>${item.class_level}</td>
                            <td>${teacherName}</td>
                            <td>${currentYear} - ${currentYear + 1}</td>
                            <td>${item.status}</td>
                            <td>
                                <a href="#" class="btn btn-sm rounded" onClick="showDetails(${item.id});">
                                    <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                                </a>
                            </td>
                        </tr>`;
                        $('#table_data').append(row);
                    });
                }

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
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', errorThrown);
        }
    });
}


/*********************/

// Filter teachers available
function fetchFilteredTeachers(teacherInput = null, dropdownMenuId, selectedTeacherIdField, teacherButtonId) {
    var xhr = new XMLHttpRequest();
    var url = 'teacher_id.php';

    // If a courseInput is provided, modify the URL to include the search input
    if (teacherInput !== null) {
        url += '?search_input=' + encodeURIComponent(teacherInput);
    }

    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var teacher = JSON.parse(xhr.responseText);

                // Build the dropdown options
                var dropdownMenu = document.getElementById(dropdownMenuId);
                dropdownMenu.innerHTML = ''; // Clear previous options

                for (var i = 0; i < teacher.length; i++) {
                    var option = document.createElement('a');
                    option.classList.add('dropdown-item');
                    option.href = '#';
                    option.setAttribute('data-id', teacher[i].id);
                    option.innerText = teacher[i].firstname + " " + teacher[i].lastname;

                    option.addEventListener('click', function() {
                        // Set the selected teacher ID in the hidden input field
                        var selectedTeacherId = this.getAttribute('data-id');
                        document.getElementById(selectedTeacherIdField).value = selectedTeacherId;

                        // Update the dropdown button text to the selected teacher name
                        var teacherButton = document.getElementById(teacherButtonId);
                        teacherButton.value = this.innerText;
                    });

                    dropdownMenu.appendChild(option);
                }
            } else {
                console.log('Error: Could not fetch teacher.');
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
    $('#teacherInput').on('input click', function() {
        $('#selected_teacher_id').val('');
        var teacherInput = $(this).val();
        fetchFilteredTeachers(teacherInput, 'teacherToggleButtons', 'selected_teacher_id', 'teacherInput');   
    });

    // Handle the update course input in modal
    $('#update_teacherInput').on('input click', function() {
        $('#update_selected_teacher_id').val('');
        var update_teacherInput = $(this).val();
        fetchFilteredTeachers(update_teacherInput, 'update_teacherToggleButtons', 'update_selected_teacher_id', 'update_teacherInput');
    });

});
