$(function(){
    //POSTS
    $("#postForm").submit(function(){

        var values = $("#postForm").serialize();
        var subject = $("#postSubject").val();
        var content = $("#postTextArea").val();
        var contentId = $("#contentId").val();
        var user = $("#user").val();
        var date_entered = "Just Now";


        if(user !== "") {
            $.ajax({
                type: "POST",
                url: "/post_handler_AJAX.php",
                data: values,
                success: function () {
                    $("#userPosts").prepend("<div class='userPosts' id='postBlock" + contentId + "'> " +
                        " <p class='username'><a href=''>" + user + "</a></p>" +
                        "<p class='editPost'><a onclick='removeNewPost(" + contentId + ")'>X</a></p>" +
                        "<span class='meetupLabel postLabel'>Post</span><hr class='hrPost'/> <p class='postTitle'>" + subject + "</p>" +
                        "<div class='textareaContent'><textarea readonly>" + content + "</textarea></div> " +
                        "<span class='datePosted'>" + date_entered + "</span>" +
                        "</div>");
                    $("#postSubject").val("");
                    $("#postTextArea").val("");
                },
                error: function () {
                    alert("FAILURE");
                }
            });
        }

        else {
            alert("This feature is not available for guests. Please sign in or register to make a post.");
        }
        return false;
    });

    //MEETUPS
    $("#meetupForm").submit(function(){
        var values = $("#meetupForm").serialize();
        var subject = $("#meetupSubject").val();
        var content = $("#meetupContent").val();
        var datePicker = $("#date").val();
        var user = $("#user").val();
        var date_entered = "Just Now";
        var contentId = $("#contentId").val();




        if(user !== "") {
            $.ajax({
                type: "POST",
                url: "/post_handler_AJAX.php",
                data: values,
                success: function () {
                    $("#userPosts").prepend("<div class='userPosts' id='postBlock" + contentId + "'> " +
                        " <p class='username'><a href=''>" + user + "</a></p>" +
                        "<p class='editPost'><a onclick='removeNewPost(" + contentId + ")'>X</a></p>" +
                        "<span class='meetupLabel'>Meet-Up</span><p class='meetupDate'>" + datePicker + "</p><span class='startDate'>Meet-up date:  </span>" +
                        "<hr class='hrPost'/> <p class='postTitle'>" + subject + "</p>" +
                        "<div class='textareaContent'><textarea readonly>" + content + "</textarea></div> " +
                        "<span class='datePosted'>" + date_entered + "</span></div>");

                    $("#meetupSubject").val("");
                    $("#meetupContent").val("");
                    $("#date").val("");

                },
                error: function () {
                    alert("FAILURE");
                }
            });
        }
        else {
            return alert("This feature is not available for guests. Please sign in or register to make a post.");
        }
        return false;
    })

});

function removeNewPost(contentID){
    var id = contentID;
    document.getElementById("postBlock" + id).remove();
        $.ajax({
            type: "POST",
            url: "/delete_post.php?content_id=" + id,
            success: function () {
            },
            error: function () {
                alert("FAILURE");
            }
        });
}

