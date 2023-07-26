$(document).ready(function() {
    let lrnToUpdate;

    // Attach click event handler to each student row
    $('.student-row').click(function() {
        lrnToUpdate = $(this).data('lrn');
        $('#myModal').modal('show');
    });

    $('#modal-save-btn').click(function() {
        const gwaInput = $('#gwa-input').val();
        if (!gwaInput || isNaN(gwaInput)) {
            alert('Please enter a valid GWA.');
            return;
        }

        $('#myModal').modal('hide');

        // Make the AJAX request to save_gwa.php
        $.ajax({
            type: 'POST',
            url: 'save_gwa.php',
            data: { lrn: lrnToUpdate, gwa: gwaInput },
            success: function(response) {
                // If the AJAX request is successful, update the displayed GWA in the table
                if (response === 'Success') {
                    // Find the corresponding table cell and update its text content
                    $(`.student-row[data-lrn='${lrnToUpdate}'] .gwa-cell`).text(gwaInput);
                } else {
                    alert('Error updating GWA: ' + response);
                }
            },
            error: function(xhr, status, error) {
                alert('Error updating GWA: ' + error);
            }
        });
    });
});
