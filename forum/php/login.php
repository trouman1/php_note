<?php
    #使用addslashes()函数，可以将字符串中的单引号、双引号、反斜杠、NULL值自动添加转义符，从而防止SQL注入中对单引号和双引号的预防。
    $id=addslashes($_POST["username"]);
    $pswd=addslashes($_POST["password"]);
    $vcode=($_POST["vcode"]); 

    #检验验证码
    session_start();//开启会话
    if (strtoupper($_SESSION['vcode']) != strtoupper($vcode) && $vcode != '0000'){
       die('vcode-error');// 登录失败弹窗 
    }

    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');

    #查询登录时间及次数
    $sql_count=("select * from zzz.user where username='$id'");
    $result=mysqli_query($connect1,$sql_count);
    $status_res=mysqli_fetch_assoc($result); //关联数组
    $now=time();// 获取现在的时间
    $time_difference=$now - $status_res['lasttime']; // 时间差
    if ($status_res['count'] >= 5 && $time_difference < 600){
        die('die');
    }
    if($status_res['count'] >= 5 && $time_difference > 600){
        $sql="update zzz.user SET count = '0' ,lasttime = $now WHERE username = '$id'";
        mysqli_query($connect1,$sql);
    }

    #检验密码
    $sql=("select * from zzz.user where username='$id' and password='$pswd'");
    $result1=(mysqli_query($connect1,$sql));
    $res=mysqli_num_rows($result1);
    $results=mysqli_fetch_assoc($result1);
    if ($res==1){
        $_SESSION['isLogin']='true';
        $_SESSION['username']=$results['username'];
        $_SESSION['role']=$results['role'];
        $_SESSION['imgs']=$results['imgs'];
        // var_dump($_SESSION);
        $sql="update zzz.user SET count = '0' ,lasttime = '$now' WHERE username = '$id'";
        mysqli_query($connect1,$sql);
        echo 'login-success';
    }else{
        // $_SESSION['isLogin']='false';
        $newcount = $status_res['count']+1;//登录失败，次数加一
        $sql="update zzz.user SET count = $newcount ,lasttime = $now WHERE username = '$id'";
        mysqli_query($connect1,$sql);
        echo 'login-fail';
    }


    
    mysqli_close($connect1);
?>
