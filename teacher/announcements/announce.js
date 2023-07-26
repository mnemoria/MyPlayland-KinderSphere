function createPost(){
    var heading = $('#txt_heading').val();
    var content = $('#txt_content').val();
    var class_id = $('input[name="class_id"]').val();

    if (heading.trim() === "" || content.trim() === "") {
        alert("Please enter a heading and content before submitting.");
        return;
    }

    $.ajax ({
        url: "create_post.php",
        type: 'POST',
        data: {
            heading: heading,
            content: content,
            class_id: class_id
        },
        success: function(response){
            $('#fetch_post').empty();
            alert(response);
            fetchAnnouncements();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
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
                                <div class="dropdown">
                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class='bx bx-dots-horizontal-rounded' ></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" onClick="deleteAnnouncement(${item.id})">Delete</a>
                                    </div>
                                </div>
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

/************/

function deleteAnnouncement(announcementId) {
    $.ajax({
        url: "delete_post.php",
        type: "POST",
        data: {
            announcement_id: announcementId
        },
        success: function(response) {
            $('#fetch_post').empty();
            alert(response);
            fetchAnnouncements();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

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

$(document).ready(function() {
    fetchAnnouncements();
});