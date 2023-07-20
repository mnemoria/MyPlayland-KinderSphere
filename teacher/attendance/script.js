var unsavedChanges = false;
var currentDate = new Date();
var formattedDate = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2);
var previousDate = formattedDate;
$('#datepicker').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy-mm-dd',
    value: formattedDate ,
    onClose: function () {
        var selectedDate = $('#datepicker').val();
        getStudentAttendanceByDate(selectedDate);
    }
});

// Function to get the student attendance data for a specific date
function getStudentAttendanceByDate(date) {
    $.ajax({
        type: 'GET',
        url: 'fetch_attendance.php', // Replace with the correct URL to fetch attendance data by date
        data: { selectedDate: date },
        dataType: 'json',
        success: function (data) {
            var dataTable = $('#attendanceTable').DataTable();
            dataTable.clear();

            data.forEach(function (student) {
                var presentId = `attendance_status_present_${student.student_id}`;
                var absentId = `attendance_status_absent_${student.student_id}`;
                var lateId = `attendance_status_late_${student.student_id}`;
                var radioGroupName = `attendance_status_${student.student_id}`;
            
                var attendanceStatus = student.attendance_status; // Get the attendance status from the data
            
                dataTable.row.add([
                    `<div class="">${student.surname}, ${student.name}</div>
                    <small class="font-weight-bold">${student.student_id}</small>
                    `,
                    student.student_id,
                    `<div class="btn-group" role="group" aria-label="Attendance Status">
                        <label for="${presentId}" type="button" class="btn attendance-btn ${
                            attendanceStatus === 'Present' ? 'btn-success text-light' : 'btn-outline-none'
                        }" data-status="Present">
                            <input class="d-none" type="radio" id="${presentId}" value="Present" name="${radioGroupName}" ${
                                attendanceStatus === 'Present' ? 'checked' : ''
                            }> Present
                        </label>
                        <label for="${lateId}" type="button" class="btn attendance-btn ${
                            attendanceStatus === 'Late' ? 'btn-warning text-light' : 'btn-outline-none'
                        }" data-status="Late"> 
                            <input class="d-none" type="radio" id="${lateId}" value="Late" name="${radioGroupName}" ${
                                attendanceStatus === 'Late' ? 'checked' : ''
                            }> Late
                        </label>
                        <label for="${absentId}" type="button" class="btn attendance-btn ${
                            attendanceStatus === 'Absent' ? 'btn-danger text-light' : 'btn-outline-none'
                        }" data-status="Absent">
                            <input class="d-none" type="radio" id="${absentId}" value="Absent" name="${radioGroupName}" ${
                                attendanceStatus === 'Absent' ? 'checked' : ''
                            }> Absent
                        </label>
                    </div>`,
                    `<input class="form-control" type="text" name="remarks" value="${student.remarks || ''}">`
                ]).draw(false);
            });
            
            // Event listener for radio button changes
            $('#attendanceTable').on('change', 'input[type="radio"]', function () {
                var radioInput = $(this);
                var radioLabel = radioInput.closest('label');
            
                // Remove the btn-outline-secondary and bg-* classes from all label buttons in the same group
                radioInput.closest('.btn-group').find('label').removeClass('btn-outline-secondary btn-success btn-danger btn-warning text-light');
            
                // Highlight the selected radio button's label based on its value
                if (radioInput.prop('checked')) {
                    var status = radioInput.val();
                    switch (status) {
                        case 'Present':
                            radioLabel.addClass('btn-success text-light');
                            break;
                        case 'Absent':
                            radioLabel.addClass('btn-danger text-light');
                            break;
                        case 'Late':
                            radioLabel.addClass('btn-warning text-light');
                            break;
                        default:
                            radioLabel.addClass('btn-outline-danger');
                            break;
                    }
                }

                unsavedChanges = true;
            });

            // Redraw the table with the updated data
            dataTable.draw();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
$('#datepicker').on('change', function () {
    var selectedDate = $('#datepicker').val();

    // Check if the selected date is different from the previous date and there are unsaved changes
    if (selectedDate !== previousDate && unsavedChanges) {
        // Show a confirm dialog to warn the user about unsaved changes
        var confirmResult = confirm('You have unsaved changes. Changing the date will lose these changes. Are you sure you want to proceed?');

        // If the user clicks 'Cancel' on the confirm dialog, do not proceed with changing the date
        if (!confirmResult) {
            // Reset the date picker to the previous date
            $('#datepicker').datepicker('setDate', previousDate);
            return;
        }

    }

   
    // Check if the selected date is different from the previous date
    if (selectedDate !== previousDate) {
        // Update the previous date with the new selected date
        previousDate = selectedDate;
        unsavedChanges = false;
        // Call the function to fetch attendance data for the selected date
        getStudentAttendanceByDate(selectedDate);
    }
});

$(document).ready(function () {
    $('#datepicker').val(formattedDate);

    getStudentAttendanceByDate( $('#datepicker').val());

    // Save attendance button click event
    $('#saveAttendanceBtn').click(function () {
        // Array to store the attendance data for all students
        var attendanceData = [];

        // Loop through each student row in the table
        $('#attendanceTableBody tr').each(function () {
            var studentId = $(this).find('td:nth-child(2)').text();
            var attendanceStatus = $(this).find('input[name^="attendance_status"]:checked').val();
            var remarks = $(this).find('input[name="remarks"]').val();
            var date = $('#datepicker').val();

            if (attendanceStatus === undefined) {
                attendanceStatus = null;
            }

            if (remarks === undefined) {
                remarks = null;
            }


            var studentAttendance = {
                student_id: studentId,
                attendance_status: attendanceStatus,
                remarks: remarks,
                date: date,
            };

            attendanceData.push(studentAttendance);
        });

        console.log('Attendance Data:', attendanceData);

        $.ajax({
            type: 'POST',
            url: 'save_attendance.php',
            data: JSON.stringify(attendanceData), // Convert the attendanceData array to JSON format
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                console.log('Attendance saved successfully:', response);
                if (response.success) {
                    console.log(response)
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
                console.error('Error saving attendance:', xhr.responseText);
            }
        });

        unsavedChanges = false;

    });

});

