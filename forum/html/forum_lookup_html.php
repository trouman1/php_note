<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>look up</title>
</head>
<body style="background:url(../bg_image/3.webp)  no-repeat center center;background-size:cover;background-attachment:fixed;">
    <div>
    <a href="./forum_html.php">
        <input type="button" name="test" value="back"/>
    </a>
    </div>
    <br>
<?php
    header("Content-Security-Policy: script-src 'self'; report-uri http://localhost/forum/php/cspreport.php");//report-uri安全报告
    session_start();//开启会话
    if($_SESSION['isLogin']=='false')die('please login');
    $forumid=$_GET['forumid'];
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');//连接数据库
    $sql="select * from zzz.forum where forumid=$forumid";//查询语句
    mysqli_query($connect1,"set names utf8");//设置编码格式，一定要放在结果的前面
    $result=mysqli_query($connect1,$sql);

    echo mysqli_error($connect1);//供错误注入专用

    //正常用这个
    $res=mysqli_fetch_assoc($result);//从结果集中取得一行作为关联数组
    $res1=$res["headline"];
    $res2=$res["username"];
    $res3=$res["content"];
    echo "<div style='font-size: 30px;color: white;'>$res1</div>";
    echo "<br>";
    echo "<div style='color: white;'>作者：$res2</div>";
    echo "<br>";
    echo "<div style='color: white;'>$res3</div>";


    mysqli_close($connect1);
?>
</body>
</html>