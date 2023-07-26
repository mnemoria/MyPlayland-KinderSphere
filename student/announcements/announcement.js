$(document).ready(function() {
    fetchAnnouncements();
});

/************/

function escapeContent(content) {
    return content
        .replace(/\\n/g, '<br>') // Replace \n with <br>
        .replace(/\\'/g, "'")     // Replace \' with '
        .replace(/\\"/g, '"')     // Replace \" with "
        .replace(/\\t/g, '&emsp;') // Replace \t with emsp;
        .replace(/\\r/g, '');     // Remove \r
}

/************/

function fetchAnnouncements() {
    var class_id = $('input[name="class_id"]').val();
    $.ajax({
        url: "fetch_post.php", // Create a new PHP file to handle the database fetch
        type: 'POST',
        data: {
            class_id: class_id
        },
        dataType: 'json', // Expect JSON response from the PHP file
        success: function(response) {
            $('#fetch_post').empty();

            if (response && response.records && response.records.length > 0) {
                $.each(response.records, function(index, item) {
                    const announcementCard = `
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between pt-4">
                                <h5 class="m-0 font-weight-bold text-success">${item.heading}</h5>
                            </div>
                            <div class="card-body">${escapeContent(item.content)}</div>
                        </div>
                    `;

                    $('#fetch_post').append(announcementCard);
                });
            } else {
                const announcementCard = `
                    <div class="card-header d-flex justify-content-between py-3">
                        <h6 class="m-0 text-success">No Announcements Found</h6> 
                    </div>
                `;
                $('#fetch_post').append(announcementCard);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}