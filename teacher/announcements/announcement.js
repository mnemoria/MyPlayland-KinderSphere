function createPost(){
    var heading = $('#txt_heading').val();
    var content = $('#txt_content').val();

    $.ajax ({
        url: "create_post.php",
        type: 'POST',
        data: {
            heading: heading,
            content: content
        },
        success: function(response){

            alert(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

/************/

// Function to fetch announcements
function fetchAnnouncements() {
    alert("hi");
    $.ajax({
        url: "create_post.php",
        type: 'GET',
        dataType: 'html',
        success: function(response) {
            // Update the content of the corresponding HTML elements
            $("#fetch_heading").html($(response).find("#fetch_heading").html());
            $("#fetch_content").html($(response).find("#fetch_content").html());
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

/************/

$(document).ready(function() {
    fetchAnnouncements();
});