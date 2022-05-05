function doDelete(forumid){
    if(!window.confirm("Are U sure?")){
        return false;
    }
    $.get(`../php/forum_delete.php?forumid=${forumid}`,function(data){
        if (data==1){ 
            alert('delete success');
            location.reload();//页面刷新
        }else{
            alert('delete fail');
        } 
    });
}
