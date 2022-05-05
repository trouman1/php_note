<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify</title>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/forum_repost.js"></script>
</head>
<body style="background:url(../bg_image/3.webp)  no-repeat center center;background-size:cover;background-attachment:fixed;">
<div><a href="../html/forum_html.php"><input type="button" name="test" value="back"/></a></div><br>
<div style="text-align:center ; margin-top: 70px; ;font-family: Bradley Hand ITC;color: rgb(255, 255, 255);font-size: 20px;"><?php session_start();if($_SESSION['isLogin']=='false')die('please login'); ?>
        headline:<br>
        <input type="text" id="headline" name="headline" value="<?php $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');$forumid=$_GET['forumid'];mysqli_query($connect1,"set names utf8");$sql=("select * from zzz.forum where forumid=$forumid");$result=mysqli_query($connect1,$sql);foreach($result as $res){$res1=$res["headline"];echo $res1;}mysqli_close($connect1);?>"><br><br>
        content:<br>
        <input style="width: 500px; height: 300px;" type="text" id="content" name="content" value="<?php $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');$forumid=$_GET['forumid'];mysqli_query($connect1,"set names utf8");$sql=("select * from zzz.forum where forumid=$forumid");$result=mysqli_query($connect1,$sql);foreach($result as $res){$res3=$res["content"];echo $res3;}mysqli_close($connect1);?>"><br><br>
        <?php $forumid=$_GET['forumid'];$_SESSION['forumid']=$forumid; ?>
        <button onclick="doRepost()">post</button>
    </div>
</body>
</html>