$(function(){
    $('textarea').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    $('#toggle > button').click(function() {
        var ix = $(this).index();

        $('#makePostContainer').toggle( ix === 0 );
        $('#makeMeetupContainer').toggle( ix === 1 );
    });

});

function makePost(){
    document.getElementById("postContainer").style.backgroundColor = "rgb(222, 240, 255)";
    document.getElementById("postBtn").style.backgroundColor = "#4267b2";
    document.getElementById("meetupBtn").style.backgroundColor = "transparent";
    document.getElementById("postBtn").style.color = "white";
    document.getElementById("meetupBtn").style.color = "black";




}

function makeMeetUp(){
    document.getElementById("postContainer").style.backgroundColor = "rgba(222, 4, 1, 0.31)";
    document.getElementById("postBtn").style.backgroundColor = "transparent";
    document.getElementById("meetupBtn").style.backgroundColor = "indianred";
    document.getElementById("postBtn").style.color = "black";
    document.getElementById("meetupBtn").style.color = "white";
}


setTimeout(function(){
    $(".message").fadeOut(2000, function(){
        $(this).remove();
    });
}, 7000);

