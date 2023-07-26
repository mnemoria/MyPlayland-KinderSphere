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
    var classInput = document.getElementById('classInput').value.trim();
    var date_added = document.getElementById('date_added').value;
    var first_name = document.getElementById('firstName').value.trim();
    var last_name = document.getElementById('lastName').value.trim();
    var sex = document.getElementById('sex').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var birthdate = document.getElementById('birthdate').value;
    var parentName = document.getElementById('parentName').value.trim();
    var en_status = document.getElementById('enStatus').value;
    var address = document.getElementById('address').value.trim();
    var LRN = document.getElementById('LRN').value.trim();
    var selected_class_id = document.getElementById('selected_class_id').value;
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

    if(selected_class_id === '') {
        message = "Choose a course among the list."
        return false;
    }

    // Check if any of the required fields are empty
    if (
        date_added === ''|| file === null || first_name === '' || last_name === '' ||
        sex === '' || email === '' || password === '' || phone === '' || birthdate === '' || 
        address === '' || parentName === '' || en_status === '' || LRN === '' || classInput === ''
    ) {
        message = "Please fill in all of the fields."
        return false;
    } else {

        // Check if first_name and last_name contain only alphabets
        if (!namePattern.test(parentName) || !namePattern.test(first_name) || !namePattern.test(last_name)) {
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
        var selected_class_id = $('#selected_class_id').val();
        var date_added = $('#date_added').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var sex = $('#sex').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var phone = $('#phone').val();
        var birthdate = $('#birthdate').val();
        var parentName = $('#parentName').val();
        var enStatus = $('#enStatus').val();
        var LRN = $('#LRN').val();
        var address = $('#address').val();

        // Handle image upload using FormData
        var formData = new FormData();
        formData.append('selected_class_id', selected_class_id);
        formData.append('date_added', date_added);
        formData.append('firstName', firstName);
        formData.append('lastName', lastName);
        formData.append('sex', sex);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('phone', phone);
        formData.append('birthdate', birthdate);
        formData.append('parentName', parentName);
        formData.append('enStatus', enStatus);
        formData.append('LRN', LRN);
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
                $("#CreateStudent").modal("hide");
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
    var update_classInput = document.getElementById('update_classInput').value.trim();
    var update_date_added = document.getElementById('update_date_added').value;
    var update_first_name = document.getElementById('update_firstName').value.trim();
    var update_last_name = document.getElementById('update_lastName').value.trim();
    var update_sex = document.getElementById('update_sex').value.trim();
    var update_email = document.getElementById('update_email').value.trim();
    var update_phone = document.getElementById('update_phone').value.trim();
    var update_birthdate = document.getElementById('update_birthdate').value;
    var update_parentName = document.getElementById('update_parentName').value.trim();
    var update_en_status = document.getElementById('update_enStatus').value;
    var update_address = document.getElementById('update_address').value.trim();
    var update_LRN = document.getElementById('update_LRN').value.trim();
    var update_selected_class_id = document.getElementById('update_selected_class_id').value;

    if(update_selected_class_id === '') {
        message = "Choose a course among the list."
        return false;
    }

    // Check if any of the required fields are empty
    if (
        update_date_added === ''|| update_first_name === '' || update_last_name === '' ||
        update_sex === '' || update_email === '' || update_phone === '' || update_birthdate === '' || 
        update_address === '' || update_parentName === '' || update_en_status === '' || update_LRN === '' || update_classInput === ''
    ) {
        message = "Please fill in all of the fields."
        return false;
    } else {

        // Check if first_name and last_name contain only alphabets
        if (!namePattern.test(update_parentName) || !namePattern.test(update_first_name) || !namePattern.test(update_last_name)) {
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

/* Update Data */
function viewDetails(id){
    $.post("update.php", {id:id}, function(data, status){
        var viewData = JSON.parse(data);

        $('#view_date_added').text(viewData.date_added);
        $('#view_name').text(viewData.firstname + " " + viewData.lastname);
        $('#view_sex').text(viewData.sex);
        $('#view_email').text(viewData.email);
        $('#view_phone').text(viewData.phone);
        $('#view_birthdate').text(viewData.birthdate);
        $('#view_parentName').text(viewData.parent_name);
        $('#view_enStatus').text(viewData.status);
        $('#view_LRN').text(viewData.lrn);
        $('#view_address').text(viewData.address);
        $('#teacher_image').attr('src', 'data:image/png;base64,' + viewData.picture);

        // Show the modal after populating the data
        $("#ViewStudent").modal("show");

        loadTableData(currentPage);
        document.getElementById('dropdownMenuButton').innerHTML = "Status";
    });
}

/*********************/

/* Update Data */
function showDetails(id){
    $('#hidden_data').val(id);
    
    $.post("update.php", {id:id}, function(data, status){
        var studentData = JSON.parse(data);

        $('#update_selected_class_id').val(studentData.class_id);
        $('#update_date_added').val(studentData.date_added);
        $('#update_firstName').val(studentData.firstname);
        $('#update_lastName').val(studentData.lastname);
        $('#update_sex').val(studentData.sex);
        $('#update_email').val(studentData.email);
        $('#update_phone').val(studentData.phone);
        $('#update_birthdate').val(studentData.birthdate);
        $('#update_parentName').val(studentData.parent_name);
        $('#update_enStatus').val(studentData.status);
        $('#update_LRN').val(studentData.lrn);
        $('#update_address').val(studentData.address);

        // Retrieve the course_name and course_code using the course_id
        $.post("retrieve_class.php", { class_id: studentData.class_id }, function (classData, status) {
            var classInfo = JSON.parse(classData);
            $('#update_classInput').val(classInfo.class_level + " - " + classInfo.class_name);
        });

        // Show the modal after populating the data
        $("#EditStudent").modal("show");

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
        var update_selected_class_id = $('#update_selected_class_id').val();
        var update_date_added = $('#update_date_added').val();
        var update_firstName = $('#update_firstName').val();
        var update_lastName = $('#update_lastName').val();
        var update_sex = $('#update_sex').val();
        var update_email = $('#update_email').val();
        var update_phone = $('#update_phone').val();
        var update_birthdate = $('#update_birthdate').val();
        var update_parentName = $('#update_parentName').val();
        var update_enStatus = $('#update_enStatus').val();
        var update_LRN = $('#update_LRN').val();
        var update_address = $('#update_address').val();
        var hidden_data = $('#hidden_data').val();

        $.post("update.php", {
            update_selected_class_id: update_selected_class_id,
            update_date_added: update_date_added,
            update_firstName: update_firstName,
            update_lastName: update_lastName,
            update_sex: update_sex,
            update_email: update_email,
            update_phone: update_phone,
            update_birthdate: update_birthdate,
            update_parentName: update_parentName,
            update_enStatus: update_enStatus,
            update_LRN: update_LRN,
            update_address: update_address,
            hidden_data: hidden_data
        }, function(response){
                alert(response);
            
                // for modal
                $('.modal-body').css('opacity', '');
                $('.update').prop('disabled', false);
                $("#EditStudent").modal("hide");
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
            $('#total_count').text(`You have a total of ${data.total_records} students.`);

            // An array to store all the AJAX calls
            var ajaxCalls = [];

            $.each(data.records, function(index, item) {
                // Retrieve the teacher name using the teacher_id
                var ajaxCall = $.post("retrieve_class.php", { class_id: item.class_id });
                ajaxCalls.push(ajaxCall);
            });

            $.when.apply($, ajaxCalls).then(function() {
                // Process the results when all AJAX calls are done
                var responses = arguments.length === 3 ? [arguments] : arguments;
                var classNames = [];
            
                // Convert the arguments object to an array
                var responseArray = Array.from(responses);
            
                responseArray.forEach(function(response) {
                    try {
                        var parsedResponse = JSON.parse(response[0]);
                        classNames.push(parsedResponse);
                    } catch (error) {
                        console.error("Error parsing JSON response for class:", error);
                        classNames.push(null);
                    }
                });
            
                // Clear the table before appending rows
                $('#table_data').empty();
            
                if (data.records.length === 1) {
                    var item = data.records[0];
                    var classInfo = classNames[0];
                    var className = classInfo ? classInfo.class_level + " - " + classInfo.class_name : "Unknown Class";
            
                    const row = `<tr>
                        <td style="vertical-align: middle">${item.num}</td>
                        <td style="vertical-align: middle"><img src="${convertToDataUrl(item.picture)}" alt="Student Image" height=50; style="margin-right: 1vw; border-radius: 50%;"> ${item.firstname} ${item.lastname}</td>
                        <td style="vertical-align: middle">${item.email}</td>
                        <td style="vertical-align: middle">${item.phone}</td>
                        <td style="vertical-align: middle">${className}</td>
                        <td style="vertical-align: middle">${item.status}</td>
                        <td style="vertical-align: middle">
                            <a href="#" class="btn btn-sm rounded" onClick="showDetails(${item.id});">
                                <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm rounded" style="min-width: 70px; margin: 1px;" onClick="viewDetails(${item.id});">
                                <i class="bx bx-info-circle" style="color:#ffffff;"></i> View
                            </a>
                        </td>
                    </tr>`;
                    $('#table_data').append(row);
                } else {
                    $.each(data.records, function(index, item) {
                        var classInfo = classNames[index];
                        var className = classInfo ? classInfo.class_level + " - " + classInfo.class_name : "Unknown Class";
            
                        const row = `<tr>
                            <td style="vertical-align: middle">${item.num}</td>
                            <td style="vertical-align: middle"><img src="${convertToDataUrl(item.picture)}" alt="Student Image" height=50; style="margin-right: 1vw; border-radius: 50%;"> ${item.firstname} ${item.lastname}</td>
                            <td style="vertical-align: middle">${item.email}</td>
                            <td style="vertical-align: middle">${item.phone}</td>
                            <td style="vertical-align: middle">${className}</td>
                            <td style="vertical-align: middle">${item.status}</td>
                            <td style="vertical-align: middle">
                                <a href="#" class="btn btn-sm rounded" onClick="showDetails(${item.id});">
                                    <i class="bx bxs-edit" style="color:#ffffff"></i> Edit
                                </a>
                                <a href="#" class="btn btn-sm rounded" style="min-width: 70px; margin: 1px;" onClick="viewDetails(${item.id});">
                                    <i class="bx bx-info-circle" style="color:#ffffff;"></i> View
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

// Filter courses available
function fetchFilteredClasses(classInput = null, dropdownMenuId, selectedClassIdField, classButtonId) {
    var xhr = new XMLHttpRequest();
    var url = 'class_id.php';

    // If a courseInput is provided, modify the URL to include the search input
    if (classInput !== null) {
        url += '?search_input=' + encodeURIComponent(classInput);
    }

    xhr.open('GET', url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var classes = JSON.parse(xhr.responseText);

                // Build the dropdown options
                var dropdownMenu = document.getElementById(dropdownMenuId);
                dropdownMenu.innerHTML = ''; // Clear previous options

                for (var i = 0; i < classes.length; i++) {
                    var option = document.createElement('a');
                    option.classList.add('dropdown-item');
                    option.href = '#';
                    option.setAttribute('data-id', classes[i].id);
                    option.innerText = classes[i].class_level + " - " + classes[i].class_name;

                    option.addEventListener('click', function() {
                        // Set the selected class ID in the hidden input field
                        var selectedClassId = this.getAttribute('data-id');
                        document.getElementById(selectedClassIdField).value = selectedClassId;

                        // Update the dropdown button text to the selected course name
                        var classButton = document.getElementById(classButtonId);
                        classButton.value = this.innerText;
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

    // Handle the class input in modal
    $('#classInput').on('input click', function() {
        $('#selected_class_id').val('');
        var classInput = $(this).val();
        fetchFilteredClasses(classInput, 'classToggleButtons', 'selected_class_id', 'classInput');
    });

    // Handle the update class input in modal
    $('#update_classInput').on('input click', function() {
        $('#update_selected_class_id').val('');
        var update_classInput = $(this).val();
        fetchFilteredClasses(update_classInput, 'update_classToggleButtons', 'update_selected_class_id', 'update_classInput');
    });

});
