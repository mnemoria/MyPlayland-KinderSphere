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

/* Check if all fields are filled before submitting the form */
function validateSubmit() {
    var course_code = document.getElementById('course_code').value.trim();
    var course_name = document.getElementById('course_name').value.trim();
    var date_added = document.getElementById('date_added').value;
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
    if (course_code !== '' && course_name !== '' && selectedStatus !== false && date_added !== '') {
        return true;
    } else {
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
        var code = $('#course_code').val();
        code = code.toUpperCase();
        var name = $('#course_name').val();
        var date = $('#date_added').val();
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
                date: date,
                status: status,
            },
            success: function(response){
                loadTableData(totalPages);
                document.getElementById('dropdownMenuButton').innerHTML = "Status";

                alert(response);

                $('.modal-body').css('opacity', '');
                $('.submit').prop('disabled', false);
                $("#CreateCourse").modal("hide");
                $("#form")[0].reset();  
            },
            error: function (error) {
                alert("Error occurred: " + error.statusText);
            }
        });
    } else {
        alert("Please answer all fields");
        $('.modal-body').css('opacity', '');
        $('.submit').prop('disabled', false);
    }
}

/*********************/

/* Check if all fields are filled before updating the form */
function validateUpdate() {
    var course_code = document.getElementById('update_course_code').value.trim();
    var course_name = document.getElementById('update_course_name').value.trim();
    var date_added = document.getElementById('update_date_added').value;
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
    if (course_code !== '' && course_name !== '' && selectedStatus !== false && date_added !== '') {
        return true;
    } else {
        return false;
    }
}

/*********************/

/* Update Data */
function showDetails(id){
    $('#hidden_data').val(id);
    
    $.post("update.php", {id:id}, function(data, status){
        var courseData = JSON.parse(data);

        $('#update_course_code').val(courseData.course_code);
        $('#update_course_name').val(courseData.name);
        $('#update_date_added').val(courseData.date_added);

        if (courseData.status === "Active") {
            $('#update_active').prop('checked', true);
        } else if (courseData.status === "Archive") {
            $('#update_archive').prop('checked', true);
        }

        // Show the modal after populating the data
        $("#EditCourse").modal("show");

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
        var update_code = $('#update_course_code').val();
        update_code = update_code.toUpperCase();
        var update_name = $('#update_course_name').val();
        var update_date = $('#update_date_added').val();
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
            update_status: update_status,
            hidden_data: hidden_data
        }, function(response){
                alert(response);

                // for modal
                $('.modal-body').css('opacity', '');
                $('.update').prop('disabled', false);
                $("#EditCourse").modal("hide");
                $("#form")[0].reset();

                loadTableData(currentPage);
                document.getElementById('dropdownMenuButton').innerHTML = "Status";
        });
    } else {
        alert("Please answer all fields");
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
            $('#total_count').text(`You have a total of ${data.total_records} course categories.`);

            // Loop through the data and append rows to the table
            $.each(data.records, function(index, item) {
                const row = `<tr>
                    <td>${item.num}</td>
                    <td>${item.course_code}</td>
                    <td>${item.name}</td>
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

            // If there are no records, show a message in the table
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

/* Load upon opening */
$(document).ready(function() {
    // Initial load of first page
    loadTableData(1);

    // Handle the search input
    $('#searchInput').keyup(function() {
        var input = $(this).val();
        document.getElementById('dropdownMenuButton').innerHTML = "Status";
        var filterStatus = document.getElementById('dropdownMenuButton').innerHTML;
    
        // Check if the input value is not empty
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
});

