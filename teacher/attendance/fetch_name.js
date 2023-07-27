$(document).ready(function () {
    fetchClassName();
});


function fetchClassName() {
    var class_id = $('input[name="class_id"]').val();
    $.ajax({
        url: "fetch_name.php",
        type: 'POST',
        data: {
            class_id: class_id
        },
        dataType: 'json',
        success: function(response) {
            // Update the HTML to display class_level and class_name
            if (response && response.class_level && response.class_name) {
                $('#class_name').text(response.class_level + ' - ' + response.class_name);
            } else {
                $('#class_name').text('Class not found');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
