$(function(){
    $('textarea').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });



});

function makeMeetUp(){
    document.getElementById("postContainer").style.backgroundColor = "rgba(255, 162, 162, 0.73)";
}
function makePost(){
    document.getElementById("postContainer").style.backgroundColor = "rgb(222, 240, 255)";
}

// function hideSignUp() {
//     document.getElementById("permissionOnly").style.display = "none";
// }
//
// function showSignUp() {
//    // document.getElementById("permissionCode").style.display = "none";
//     document.getElementById("permissionOnly").style.display = "show";
// }

setTimeout(function(){
    $(".message").fadeOut(2000, function(){
        $(this).remove();
    });
}, 7000);
