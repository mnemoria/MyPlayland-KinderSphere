$(document).ready(function () {
    var dataTable = $('#studentTable').DataTable({
    });

    // Add an event listener to the file input element
    $('#fileInput').on('change', function (event) {
        var file = event.target.files[0];

        // Check if a file is selected
        if (file) {
            // Use FileReader to read the selected file and display it as the profile image
            var reader = new FileReader();
            reader.onload = function () {
                $('#addStudentImage').attr('src', reader.result);
            };
            reader.readAsDataURL(file);
        }
    });

    function updateStudentTable() {
        $.ajax({
            type: 'GET',
            url: 'fetch_students.php',
            dataType: 'json',
            success: function (data) {
                // Clear the existing table content using DataTables API
                dataTable.clear();

                // Loop through the data and populate the table rows using DataTables API
                data.forEach(function (student) {
                    dataTable.row.add([
                        `<div class="">${student.surname}, ${student.name}</div>
                         <small class="font-weight-bold">${student.student_id}</small>
                        `,
                        student.email,
                        student.sex,
                        '<span class="badge badge-success">Enrolled</span>',
                        student.phone,
                        `<button class="btn btn-warning btn-edit" title="Edit Student" data-id="${student.student_id}">
                            <i class="fa fa-pen"></i>
                        </button>`
                    ]).draw(false);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    updateStudentTable();

    
    $('#addNewStudentBtn').click(function () {
        $('#addStudentModal').modal('show');
    });

    // Event listener for the "Save changes" button in the edit modal
    $('#addStudentBtn').click(function () {
        var formData = $('#addStudentForm ').serialize();

        // Collect the updated data from the modal inputs
        var addStudentData = {
            name: $('#addStudentNameInput').val(),
            surname: $('#addStudentSurnameInput').val(),
            email: $('#addStudentEmailInput').val(),
            phone: $('#addStudentPhoneInput').val(),
            address: $('#addStudentAddressInput').val(),
            sex: $('#addStudentSexInput').val(),
            birthdate: $('#addStudentBirthdateInput').val()
            // Add other data fields as needed...
        };

        // Make an AJAX request to save the changes
        $.ajax({
            type: 'POST',
            url: 'create_student.php', // Replace with the correct PHP file to handle the save request
            data: addStudentData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#addStudentModal').modal('hide');
                    $('#addStudentForm').trigger('reset');
                    updateStudentTable();
                    $('.toast').removeClass('bg-danger').addClass('bg-success');
                    $('.toast-body').text(response.message);
                    $('.toast').toast('show');
                } else {
                    $('.toast').removeClass('bg-success').addClass('bg-danger');
                    $('.toast-body').text(response.message);
                    $('.toast').toast('show');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    function editStudent(id) {
        // Make an AJAX request to fetch student data based on email
        $.ajax({
            type: 'POST',
            url: 'fetch_student.php', // Replace with the correct PHP file to fetch the student data
            data: { studentID: id },
            dataType: 'json',
            success: function (student) {
                // Check if the response contains any error
                if (student.error) {
                    console.error(student.error);
                    return;
                }

                console.log(student)

                // Fill the modal with the student data
                $('#studentID').text(student.student_id);
                $('#studentName').text(student.name);
                $('#studentSurname').text(student.surname);
                $('#studentEmail').text(student.email);
                $('#studentIDInput').val(student.student_id);
                $('#studentNameInput').val(student.name);
                $('#studentSurnameInput').val(student.surname);
                $('#studentEmailInput').val(student.email);
                $('#studentPhoneInput').val(student.phone);
                $('#studentAddressInput').val(student.address);
                $('#studentSexInput').val(student.sex);
                $('#studentBirthdateInput').val(student.birthdate);
                // Set other data fields here...

                // Show the modal
                $('#editStudentModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Event listener for the "Edit" button in each row
    $('#studentTable tbody').on('click', '.btn-edit', function () {
        var id = $(this).data('id');
        console.log('Edit button clicked for id: ' + id);

        // Call the editStudent function to open the modal and fill it with data
        editStudent(id);
    });


    // Event listener for the "Save changes" button in the edit modal
    $('#saveChangesBtn').click(function () {
        // Collect the updated data from the modal inputs
        var updatedData = {
            id: $('#studentIDInput').val(),
            name: $('#studentNameInput').val(),
            surname: $('#studentSurnameInput').val(),
            email: $('#studentEmailInput').val(),
            phone: $('#studentPhoneInput').val(),
            address: $('#studentAddressInput').val(),
            sex: $('#studentSexInput').val(),
            birthdate: $('#studentBirthdateInput').val()
            // Add other data fields as needed...
        };

        // Make an AJAX request to save the changes
        $.ajax({
            type: 'POST',
            url: 'update_student.php', // Replace with the correct PHP file to handle the save request
            data: updatedData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    console.log(response)
                    console.log(updatedData)

                    $('#editStudentModal').modal('hide');
                    updateStudentTable();
                    $('.toast').removeClass('bg-danger').addClass('bg-success');
                    $('.toast-body').text(response.message);
                    $('.toast').toast('show');
                } else {
                    $('.toast').removeClass('bg-success').addClass('bg-danger');
                    $('.toast-body').text(response.message);
                    $('.toast').toast('show');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

