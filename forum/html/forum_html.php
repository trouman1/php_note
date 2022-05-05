<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forum</title>
    <link rel="stylesheet" href="../css/forum.css">
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/forum_delete.js"></script>
    <script type="text/javascript" src="../js/forum_modify.js"></script>
    <script type="text/javascript" src="../js/forum_exit.js"></script>
</head>
<body>
    <a href="./game.html" class="button" style="text-align:center;float: right;font-family: Bradley Hand ITC;color:rgb(0, 255, 191);font-size: 25px;">play</a>
    <div style="color:white;font-size:25px;font-family: Bradley Hand ITC;">
        <?php
            session_start();//开启会话
            if($_SESSION['isLogin']=='false')die('please login');
            // echo $_SESSION['isLogin'];
            $id=$_SESSION['username'];
            $imgs=$_SESSION['imgs'];
            $role=$_SESSION['role'];
            echo "<img src='http://localhost/$imgs' width='100' height='100' /><br>welcome&nbsp;&nbsp;$id&nbsp;&nbsp;!!!<br>your role is $role.<br><button onclick='doExit()'>exit</button>";
        ?>
    </div>
    <div align="center"><a href="../html/forum_post.html"><input type="button" name="test" value="post forum"/></a></div><br>
    <table>
        <tr>
            <td>num</td>
            <td>username</td>
            <td>headline</td>
            <td>createtime</td>
            <td>operation</td>
        </tr>
    <?php
    if($_SESSION['isLogin']=='false')die('please login');
    $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');//连接数据库
    $sql="select * from zzz.forum ";//查询语句
    mysqli_query($connect1,"set names utf8");//设置编码格式，一定要放在结果的前面
    $result=mysqli_query($connect1,$sql);
    $res=mysqli_fetch_all($result,MYSQLI_ASSOC);//关联数组
    for ($i=0;$i<count($res);$i++){
        $forumid=$res[$i]["forumid"];
        echo '<tr >';
            echo '<td >'.$forumid.'</td>';
            echo '<td >'.$res[$i]["username"].'</td>';
            // echo "<td ><a href='./sql_injection_html.php?forumid=$forumid'>".$res[$i]["headline"].'</a></td>';//供注入专用
            echo "<td ><a href='./forum_lookup_html.php?forumid=$forumid'>".$res[$i]["headline"].'</a></td>';
            echo '<td >'.$res[$i]["createtime"].'</td>';
            echo "<td >
            <button onclick='doDelete($forumid)'>Del</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button onclick='doModify($forumid)'>Mod</button>
            </td>";
        echo '</tr>';}
        mysqli_close($connect1);
    ?>
    </table>
</body>
</html>