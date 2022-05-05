function doBuy(){
    //获取前端数据
    var num=$('#num').val();
    var bs=$('#bs:checked').val();//radio:务必要加checked
    var od=$('#od:checked').val();
    var zodiac=$('#zodiac').val();
    console.log(num,bs,od,zodiac);//F12，流哥专用

    //将数据打包
    var data = new FormData();
    data.append("num", num);
    data.append("bs", bs);
    data.append("od", od);
    data.append("zodiac", zodiac);

    //用POST传给后端
    $.ajax({
        url: '../php/game.php',
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        success : function(data) {
            alert(data);
        }
    });
}