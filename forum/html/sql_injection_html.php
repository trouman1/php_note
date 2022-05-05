<?php
    $forumid=$_GET['forumid'];
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0","zzz") or die ('connection failed');//连接数据库
    $sql="select * from zzz.forum where forumid=$forumid";//查询语句
    mysqli_query($connect1,"set names utf8");//设置编码格式，一定要放在结果的前面
    $result=mysqli_query($connect1,$sql);

    echo mysqli_error($connect1);//供错误注入专用


    $res=mysqli_fetch_assoc($result);//从结果集中取得一行作为关联数组
    echo $res["headline"];
    echo $res["username"];
    echo $res["content"];


    mysqli_close($connect1);
?>