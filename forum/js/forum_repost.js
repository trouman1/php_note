function doRepost(){
    var headline=$('#headline').val();
    var content=$('#content').val();
    var param=`headline=${headline}&content=${content}`;
    $.post(
        '../php/forum_repost.php',param,function(data){
            alert(data);
            if(data=='post success'){
                location.href='../html/forum_html.php'
            }else if(data=='please login'){
                location.href='../html/login.html'
            }
        }
    )
}