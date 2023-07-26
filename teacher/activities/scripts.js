$(document).ready(function() {

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


    populateSubjects();

    $('#createNewActBtn').click(function () {
        $('#addActModal').modal('show');
    });

    
        // Attach click event handler to "Save" button
        $('#addNewActBtn').click(function() {
            // Get form data
            const subjectId = $('#addSubjectInput').val();
            const activityNum = $('#addActNumInput').val();
            const activityName = $('#addActNameInput').val();
            const activityDesc = $('#addActDescInput').val();
            const activityTotalPts = $('#addTotalPtsInput').val();
            const date = $('#addDateInput').val();
    
            // Make the AJAX request to add_activity.php
            $.ajax({
                type: 'POST',
                url: 'create_activity.php',
                data: {
                    subject_id: subjectId,
                    activity_num: activityNum,
                    activity_name: activityName,
                    activity_desc: activityDesc,
                    activity_total_pts: activityTotalPts,
                    date: date
                },
                success: function(response) {
                    if (response === 'Success') {
                        $('#addActModal').modal('hide');
                        alert('Successfully added!');
                    } else {
                        alert('Error inserting activity: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error inserting activity: ' + error);
                }
            });
        });
    
    
});