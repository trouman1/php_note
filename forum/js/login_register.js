function doRegister(){
    var username = $("#username").val();//获取用户名
    var password = $("#password").val();//获取密码
    var phone = $("#phone").val();//获取电话
    var role=$("#role").val();//获取角色
    var file = $("#photo").prop("files")[0];
    var file_check = $("#photo").val();

    //提取上传文件的类型
    var file_suffix = file_check.substring(file_check.lastIndexOf("."));
    //定义允许上传的文件类型
    var allow_suffix = ".jpg|.png|.webp";
    if (allow_suffix.indexOf(file_suffix) == -1) {
        var errMsg = "该文件不允许上传，请上传" + allow_suffix + "类型的文件,当前文件类型为：" + file_suffix;
        alert(errMsg);
        return false;
    }

    var data = new FormData();
    data.append("username", username);
    data.append("password", password);
    data.append("phone", phone);
    data.append("role", role);
    data.append("file",file);
    $.ajax({
        url: '../php/login_register.php',
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        success : function(data) {
            alert(data);
            if(data=="创建成功"){
                location.href='../html/login.html'
            }else{
                location.href='../html/login_register.html'
            }
            
        }
    });
}