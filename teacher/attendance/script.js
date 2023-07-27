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

$(document).ready(function () {
    fetchClassName();
    $('#datepicker').val(formattedDate);

    console.log("Date: ", $('#datepicker').val(formattedDate))

    getStudentAttendanceByDate( $('#datepicker').val());

    $('#saveAttendanceBtn').click(function () {
        // Array to store the attendance data for all students
        var attendanceData = [];

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
                    getStudentAttendanceByDate( $('#datepicker').val());
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

function getAttendanceStats(date) {
    $.ajax({
        type: 'GET',
        url: 'fetch_attendance_stats',
        data: { selectedDate: date },
        dataType: 'json',
        success: function (attendanceStats) {

            // Display attendance statistics on the dashboard
            var totalStudents = attendanceStats.total_students ? attendanceStats.total_students : 0 ;
            var presentCount = attendanceStats.present_count ? attendanceStats.present_count : 0;
            var lateCount = attendanceStats.late_count ? attendanceStats.late_count : 0;
            var absentCount = attendanceStats.absent_count ? attendanceStats.absent_count : 0;
            var unmarkedCount = attendanceStats.unmarked_count ? attendanceStats.unmarked_count : 0;

            console.log("Total Students:", totalStudents);
            console.log("Present Count:", presentCount);
            console.log("Late Count:", lateCount);
            console.log("Absent Count:", absentCount);
            console.log("Unmarked Count:", unmarkedCount);

            $("#PresentStat").text(presentCount);
            $("#LateStat").text(lateCount);
            $("#AbsentStat").text(absentCount);
            $("#UnmarkedStat").text(unmarkedCount);
            
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }

    })
}

function getStudentAttendanceByDate(date) {
    getAttendanceStats(date);

    $.ajax({
        type: 'GET',
        url: 'fetch_attendance.php', 
        data: { selectedDate: date },
        dataType: 'json',
        success: function (data) {
            var dataTable = $('#attendanceTable').DataTable();
            dataTable.clear();

            data.forEach(function (student) {
                var presentId = `attendance_status_present_${student.lrn}`;
                var absentId = `attendance_status_absent_${student.lrn}`;
                var lateId = `attendance_status_late_${student.lrn}`;
                var radioGroupName = `attendance_status_${student.lrn}`;
            
                var attendanceStatus = student.attendance_status; 
            
                dataTable.row.add([
                    `<div class="">${student.lastname}, ${student.firstname}</div>
                    <small class="font-weight-bold">${student.lrn}</small>
                    `,
                    student.lrn,
                    `<div class="d-none">${attendanceStatus}</div><div class="btn-group" role="group" aria-label="Attendance Status">
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
                    `<div class="d-none">${student.remarks}</div><input class="form-control" type="text" name="remarks" value="${student.remarks || ''}">`
                ]).draw(false);
            });
            
            $('#attendanceTable').on('change', 'input[type="radio"]', function () {
                var radioInput = $(this);
                var radioLabel = radioInput.closest('label');
            
                radioInput.closest('.btn-group').find('label').removeClass('btn-outline-secondary btn-success btn-danger btn-warning text-light');
            
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

    if (selectedDate !== previousDate && unsavedChanges) {
        var confirmResult = confirm("You have unsaved attendance changes. Changing the date will discard these changes. Are you sure you want to proceed?");

        if (!confirmResult) {
            $('#datepicker').datepicker('setDate', previousDate);
            return;
        }

    }
   
    if (selectedDate !== previousDate) {
        previousDate = selectedDate;
        unsavedChanges = false;
        getStudentAttendanceByDate(selectedDate);
    }
});

