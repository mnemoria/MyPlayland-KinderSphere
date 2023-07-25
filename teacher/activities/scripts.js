$(document).ready(function() {
    // $('#scoreForm').on('submit', function(event) {
    //     event.preventDefault();

    //     var formData = $(this).serialize();

    //     $.ajax({
    //         type: 'POST',
    //         url: 'update_score.php',
    //         data: formData,
    //         dataType: 'json',
    //         success: function(response) {
    //             var scoreInput = $('#scoreForm input[name="score"]');
    //             scoreInput.attr('placeholder', response.new_score);
    //             scoreInput.val('');
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });

    function populateSubjects() {
        // Make an AJAX request to fetch the subject data
        fetch('fetch_subjects.php')
            .then(response => response.json())
            .then(data => {
                // Get the select element
                const selectElement = document.getElementById('addSubjectInput');
                
                // Clear any existing options
                selectElement.innerHTML = '';

                // Populate the options with the retrieved data
                data.forEach(subject => {
                    const option = document.createElement('option');
                    option.value = subject.id;
                    option.textContent = subject.subject_name;
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching subjects:', error));
    }

    // Call the function to populate the subjects dropdown
    populateSubjects();

    $('#createNewActBtn').click(function () {
        $('#addActModal').modal('show');
    });

        // // Event listener for the "Save changes" button in the edit modal
        $('#createNewActBtn').click(function () {
            var formData = $('#addActivityForm').serialize();
    
            // Collect the updated data from the modal inputs
            var addActivityData = {
                email: $('#addDateInput').val(),
                act_num: $('#addActNumInput').val(),
                act_name: $('#addActNameInput').val(),
                totalpts: $('#addTotalPtsInput').val(),
                act_desc: $('#addActDescInput').val(),
                subject_id: $('#addSubjectInput').val()
                // Add other data fields as needed...
            };
    
        //     // Make an AJAX request to save the changes
            $.ajax({
                type: 'POST',
                url: 'create_activity.php', // Replace with the correct PHP file to handle the save request
                data: addActivityData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $('#addActModal').modal('hide');
                        $('#addActivityForm').trigger('reset');
                        // updateStudentTable();
                        // $('.toast').removeClass('bg-danger').addClass('bg-success');
                        // $('.toast-body').text(response.message);
                        // $('.toast').toast('show');
                    } else {
                        // $('.toast').removeClass('bg-success').addClass('bg-danger');
                        // $('.toast-body').text(response.message);
                        // $('.toast').toast('show');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
});