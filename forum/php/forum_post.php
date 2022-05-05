<?php
    session_start();//开启会话
    // echo $_SESSION['isLogin'];
    //验证session信息和权限信息
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');
    mysqli_set_charset($connect1, 'utf8');//设置编码

    if($_SESSION['isLogin']=='true'){
        if($_SESSION['role']=="admin"||$_SESSION['role']=="member"){
            $id=$_SESSION['username'];
            $headline= $_POST['headline'];
            $content=$_POST['content'];
            $sql=("INSERT INTO `zzz`.`forum` (`forumid`, `headline`, `content`, `username`, `createtime`) VALUES (null, '$headline', '$content', '$id', now());");
            $sql1="select forumid from `zzz`.`forum` where headline='$headline'";
            mysqli_query($connect1,$sql);
            $result=mysqli_query($connect1,$sql1);
            $res=mysqli_num_rows($result);
            // echo $res;
            if ($res==1){
                echo 'post success';
            }else{
                echo 'post fail';
            }
        }else{
            echo 'no power';
        }
    }else{
        echo 'please login';
    }




    // echo $sql;
    mysqli_close($connect1);


?>