<?php
    $id=$_POST["username"]; 
    $pswd=$_POST["password"];
    $phone=$_POST["phone"];
    $role=$_POST["role"];
    $file= $_FILES['file']['name'];//上传文件的名称
    $tmp_file=$_FILES['file']['tmp_name'];//存储在服务器的文件的临时副本的名称

    //检测是否有木马
    if(check_suffix($file) && check_content($tmp_file)){
        $connect1=mysqli_connect("localhost","root","p-0p-0p-0") or die ('connection failed');
        $sql=("INSERT INTO `zzz`.`user` (`userid`, `username`, `password`, `role`, `phone`, `imgs`, `createtime`) VALUES (NULL, '$id', '$pswd', '$role', '$phone', '/forum/image/$id$file', now());");
        // echo $sql;
        $sql1=("select username from zzz.user where username='$id'");
        $result1=(mysqli_query($connect1,$sql1));
        $check_id='';
        foreach($result1 as $res){
            $check_id=$res["username"];
        }
        if($id == $check_id){
            echo "账号已存在";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], "../image/" .$_POST["username"].$_FILES["file"]["name"]);
            mysqli_query($connect1,$sql);
            echo "创建成功";
        }
        mysqli_close($connect1);
    }else{
        die('error');
    }


    function check_suffix($file){
        $file=$file;
        $standard=['.jpg','.png','.webp'];
        $suffix_1=explode('.', $file);
        $suffix='.'.end($suffix_1);
        if (in_array($suffix,$standard)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function check_content($tmp_file){
        $tmp_file=$tmp_file;
        $content = file_get_contents($tmp_file);
        if (preg_match('/php/', $content) || preg_match('/eval/', $content)) {
            return FALSE;
        }else{
            return TRUE;
        }
    }
?>