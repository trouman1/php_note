function doExit(){
    $.get("../php/forum_exit.php", function (data) {
        // alert(data);
        location.href='../html/login.html'
    })
}