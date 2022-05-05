<?php
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');
    $forumid=$_GET['forumid'];
    $sql=("delete from `zzz`.`forum` where forumid=$forumid;");
    $res=mysqli_query($connect1,$sql);
    if($res){
        echo "1";
    }else{
        echo "0";
    }
    mysqli_close($connect1);
?>