function createPost(){
    var heading = $('#txt_heading').val();
    var content = $('#txt_content').val();
    var class_id = $('input[name="class_id"]').val();
    alert(class_id);

//     $.ajax ({
//         url: "create_post.php",
//         type: 'POST',
//         data: {
//             heading: heading,
//             content: content,
//             class_id: class_id
//         },
//         success: function(response){
//             alert(response);
//             fetchAnnouncements();
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
}

/************/

// Function to fetch announcements
function fetchAnnouncements() {
    $.ajax({
        url: "create_post.php",
        type: 'GET',
        dataType: 'html',
        success: function(response) {
            // Update the content of the correspondin       g HTML elements
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