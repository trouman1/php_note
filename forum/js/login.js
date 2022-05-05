function doLogin(){
    var username=$('#username').val();//前端获取用户输入的username
    var password=$('#password').val();//前端获取用户输入的password
    var vcode = $("#vcode").val();
    var parma="username="+username+"&password="+password+"&vcode="+vcode;
    $.post(
        "../php/login.php",parma,function(data){ //匿名函数：获取响应结果：data-->php后台返回的结果
            if(data=='login-success'){
                // alert(username+'登录成功');
                location.href='../html/forum_html.php'
            }else{
                alert(data);
                // location.href='../html/login.html'
            }
        }
    )
}