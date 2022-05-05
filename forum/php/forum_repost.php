<?php
    session_start();//开启会话
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');
    mysqli_set_charset($connect1, 'utf8');//设置编码
    if($_SESSION['isLogin']=='true'){
        if($_SESSION['role']=="admin"||$_SESSION['role']=="member"){
            $id=$_SESSION['username'];
            $forumid=$_SESSION['forumid'];
            $headline= $_POST['headline'];
            $content=$_POST['content'];
            $sql="update `zzz`.`forum` set headline='$headline', content ='$content' where `forumid` = $forumid;";
            mysqli_query($connect1,$sql);
            echo 'post success';
        }else{
            echo 'no power';
        }
    }else{
        echo 'please login';
    }
    
            // echo $id;
            // echo $forumid;
            // echo $headline;
            // echo $content;
            // echo $sql;
?>