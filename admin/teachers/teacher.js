/* For Pagination */
let currentPage = 1;
let totalPages = 1;

var phonePattern = /^09\d{9}$/;
var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var namePattern = /^[A-Za-z\s]+$/;
var allowedTypes = ['image/jpeg', 'image/png'];

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
    var date_added = document.getElementById('date_added').value;
    var first_name = document.getElementById('firstName').value.trim();
    var last_name = document.getElementById('lastName').value.trim();
    var sex = document.getElementById('sex').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var birthdate = document.getElementById('birthdate').value;
    var marital_status = document.getElementById('maritalStatus').value;
    var em_status = document.getElementById('emStatus').value;
    var teacher_no = document.getElementById('teacherNo').value;
    var address = document.getElementById('address').value.trim();
    var profileImageInput = document.getElementById('profileImage');

    var selectedFiles = profileImageInput.files;
    var file = null;

    if (selectedFiles.length > 0) {
        // A file has been selected
        file = selectedFiles[0];

        // Check if the selected file is a JPG or PNG image
        if (!allowedTypes.includes(file.type)) {
            message = "Only JPG or PNG images are allowed.";
            return false;
        }
    }

    // Check if any of the required fields are empty
    if (
        date_added === ''|| file === null || first_name === '' || last_name === '' ||
        sex === '' || email === '' || password === '' || phone === '' || birthdate === '' || 
        marital_status === '' || em_status === '' || teacher_no === '' || address === ''
    ) {
        message = "Please fill in all of the fields."
        return false;
    } else {

        // Check if first_name and last_name contain only alphabets
        if (!namePattern.test(first_name) || !namePattern.test(last_name)) {
            message = "First name and last name should contain only alphabets.";
            return false;
        }

        // Check if sex contains only alphabets
        if (!namePattern.test(sex)) {
            message = "Sex should contain only alphabets.";
            return false;
        }

        // Check if email is a valid email address
        if (!emailPattern.test(email)) {
            message = "Please enter a valid email address.";
            return false;
        }

        // Check if phone is a valid 11-digit contact number starting with '09'
        if (!phonePattern.test(phone)) {
            message = "Please enter a valid 11-digit contact number starting with '09'.";
            return false;
        }

        // Password validation
        if (password.length < 8) {
            message = "Password should be at least 8 characters long.";
            return false;
        } else if (!/[a-z]/.test(password)) {
            message = "Password should contain at least one lowercase letter.";
            return false;
        } else if (!/[A-Z]/.test(password)) {
            message = "Password should contain at least one uppercase letter.";
            return false;
        } else if (!/[0-9]/.test(password)) {
            message = "Password should contain at least one digit.";
            return false;
        }

        return true;
    }
}

/*********************/

/* Add Data */
function submitForm() {
    event.preventDefault();
    $('.modal-body').css('opacity', '0.5');
    $('.submit').prop('disabled', true);

    if (validateSubmit()) {
        var date_added = $('#date_added').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var sex = $('#sex').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var phone = $('#phone').val();
        var birthdate = $('#birthdate').val();
        var maritalStatus = $('#maritalStatus').val();
        var emStatus = $('#emStatus').val();
        var teacherNo = $('#teacherNo').val();
        var address = $('#address').val();

        // Handle image upload using FormData
        var formData = new FormData();
        formData.append('date_added', date_added);
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('sex', sex);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('phone', phone);
        formData.append('birthdate', birthdate);
        formData.append('maritalStatus', maritalStatus);
        formData.append('emStatus', emStatus);
        formData.append('teacherNo', teacherNo);
        formData.append('address', address);

        var profileImageInput = $('#profileImage')[0];
        var selectedFiles = profileImageInput.files;
        if (selectedFiles.length > 0) {
            var file = selectedFiles[0];
            formData.append('profileImage', file);
        }

        $.ajax({
            url: "create.php",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                loadTableData(totalPages);
                alert(response);
                document.getElementById('dropdownMenuButton').innerHTML = "Status";

                $('.modal-body').css('opacity', '');
                $('.submit').prop('disabled', false);
                $("#CreateTeacher").modal("hide");
                $("#form")[0].reset();
            },
            error: function (error) {
                alert("Error occurred: " + error.statusText);
                $('.modal-body').css('opacity', '');
                $('.submit').prop('disabled', false);
            },
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
    var update_date_added = document.getElementById('update_date_added').value;
    var update_first_name = document.getElementById('update_firstName').value.trim();
    var update_last_name = document.getElementById('update_lastName').value.trim();
    var update_sex = document.getElementById('update_sex').value.trim();
    var update_email = document.getElementById('update_email').value.trim();
    var update_phone = document.getElementById('update_phone').value.trim();
    var update_birthdate = document.getElementById('update_birthdate').value;
    var update_marital_status = document.getElementById('update_maritalStatus').value;
    var update_em_status = document.getElementById('update_emStatus').value;
    var update_teacher_no = document.getElementById('update_teacherNo').value;
    var update_address = document.getElementById('update_address').value.trim();

    // Check if any of the required fields are empty
    if (
        update_date_added === '' || update_first_name === '' || update_last_name === '' ||
        update_sex === '' || update_email === '' || update_phone === '' || update_birthdate === '' || 
        update_marital_status === '' || update_em_status === '' || update_teacher_no === '' || update_address === ''
    ) {
        message = "Please fill in all of the fields."
        return false;
    } else {

        // Check if first_name and last_name contain only alphabets
        if (!namePattern.test(update_first_name) || !namePattern.test(update_last_name)) {
            message = "First name and last name should contain only alphabets.";
            return false;
        }

        // Check if sex contains only alphabets
        if (!namePattern.test(update_sex)) {
            message = "Sex should contain only alphabets.";
            return false;
        }

        // Check if email is a valid email address
        if (!emailPattern.test(update_email)) {
            message = "Please enter a valid email address.";
            return false;
        }

        // Check if phone is a valid 11-digit contact number starting with '09'
        if (!phonePattern.test(update_phone)) {
            message = "Please enter a valid 11-digit contact number starting with '09'.";
            return false;
        }

        return true;
    }
}

/*********************/

/* View Data */
function viewDetails(id){
    $.post("update.php", {id:id}, function(data, status){
        var viewteacherData = JSON.parse(data);

        $('#view_date_added').text(viewteacherData.date_added);
        $('#view_name').text(viewteacherData.firstname + " " + viewteacherData.lastname);
        $('#view_sex').text(viewteacherData.sex);
        $('#view_email').text(viewteacherData.email);
        $('#view_phone').text(viewteacherData.phone);
        $('#view_birthdate').text(viewteacherData.birthdate);
        $('#view_maritalStatus').text(viewteacherData.marital_status);
        $('#view_emStatus').text(viewteacherData.employment_status);
        $('#view_teacherNo').text(viewteacherData.teacher_no);
        $('#view_address').text(viewteacherData.address);
        $('#teacher_image').attr('src', 'data:image/png;base64,' + viewteacherData.picture);

        // Show the modal after populating the data
        $("#ViewTeacher").modal("show");

        loadTableData(currentPage);
        document.getElementById('dropdownMenuButton').innerHTML = "Status";
    });
}

/*********************/

/* Update Data */
function showDetails(id){
    $('#hidden_data').val(id);
    
    $.post("update.php", {id:id}, function(data, status){
        var teacherData = JSON.parse(data);

        $('#update_date_added').val(teacherData.date_added);
        $('#update_firstName').val(teacherData.firstname);
        $('#update_lastName').val(teacherData.lastname);
        $('#update_sex').val(teacherData.sex);
        $('#update_email').val(teacherData.email);
        $('#update_phone').val(teacherData.phone);
        $('#update_birthdate').val(teacherData.birthdate);
        $('#update_maritalStatus').val(teacherData.marital_status);
        $('#update_emStatus').val(teacherData.employment_status);
        $('#update_teacherNo').val(teacherData.teacher_no);
        $('#update_address').val(teacherData.address);

        // Show the modal after populating the data
        $("#EditTeacher").modal("show");

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
        var update_date_added = $('#update_date_added').val();
        var update_firstName = $('#update_firstName').val();
        var update_lastName = $('#update_lastName').val();
        var update_sex = $('#update_sex').val();
        var update_email = $('#update_email').val();
        var update_phone = $('#update_phone').val();
        var update_birthdate = $('#update_birthdate').val();
        var update_maritalStatus = $('#update_maritalStatus').val();
        var update_emStatus = $('#update_emStatus').val();
        var update_teacherNo = $('#update_teacherNo').val();
        var update_address = $('#update_address').val();
        var hidden_data = $('#hidden_data').val();

        $.post("update.php", {
            update_date_added: update_date_added,
            update_firstName: update_firstName,
            update_lastName: update_lastName,
            update_sex: update_sex,
            update_email: update_email,
            update_phone: update_phone,
            update_birthdate: update_birthdate,
            update_maritalStatus: update_maritalStatus,
            update_emStatus: update_emStatus,
            update_teacherNo: update_teacherNo,
            update_address: update_address,
            hidden_data: hidden_data
        }, function(response){
                alert(response);

                // for modal
                $('.modal-body').css('opacity', '');
                $('.update').prop('disabled', false);
                $("#EditTeacher").modal("hide");
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

function convertToDataUrl(base64String) {
    return "data:image/jpeg;base64," + base64String;
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
            $('#total_count').text(`You have a total of ${data.total_records} teachers.`);

            // Loop through the data and append rows to the table
            $.each(data.records, function(index, item) {
                const row = `<tr>
                    <td style="vertical-align: middle">${item.num}</td>
                    <td style="vertical-align: middle"><img src="${convertToDataUrl(item.picture)}" alt="Teacher Image" height=50; width=50; style="margin-right: 1vw; border-radius: 50%;"> ${item.firstname} ${item.lastname}</td>
                    <td style="vertical-align: middle">${item.email}</td>
                    <td style="vertical-align: middle">${item.phone}</td>
                    <td style="vertical-align: middle">${item.employment_status}</td>
                    <td style="vertical-align: middle">
                        <a href="#" class="btn btn-sm rounded" style="min-width: 70px; margin: 1px;" onClick="showDetails(${item.id});">
                            <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                        </a>
                        <a href="#" class="btn btn-sm rounded" style="min-width: 70px; margin: 1px;" onClick="viewDetails(${item.id});">
                            <i class="bx bx-info-circle" style="color:#ffffff;"></i> View
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
            console.log('Error fetching data:', errorThrown);
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
