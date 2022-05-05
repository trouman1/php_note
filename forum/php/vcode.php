<?php
// 利用Session保存图片验证码
# 当客户端已经获取Session id时，只要通过Http请求中的Cookie字段将其发给服务器，服务器不会再生成新的Session id。
session_start(); 

// 调用函数
getCode();

// 生成图片验证码,$vlen设置验证码长度
function getCode($vlen=4, $width=70, $height=30){
    // 定义响应类型为PNG图片
    header('content-type:image/png');

    // 生成随机验证码字符串，并将其保存在session中
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $vcode = substr(str_shuffle($chars), 0, $vlen);
    # 将生成的随机验证码字符串保存到Session变量中，供登录后对比
    $_SESSION['vcode'] = $vcode;


    // 定义图片并设置背景色RGB为：100，200，100
    $image = imagecreate($width, $height);
    $imgColor = imagecolorallocate($image, 10, 140, 210);

    // 以RGB=0，0，0的颜色绘制黑色随机字符串
    $color = imagecolorallocate($image,0,0,0);
    //5：6号字体  20：x方向  5：y方向
    imagestring($image, 10, 20, 4, $vcode, $color);

    // 生成一批随机位置的干扰点
    // for ($i=0; $i<100; $i++){
    //     imagesetpixel($image, rand(0, $width), rand(0, $height), $color);
    // }

    // 输出图片验证码，并将其在内存的数据销毁
    imagepng($image);
    imagedestroy($image);
}



?>