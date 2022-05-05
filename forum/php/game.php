<?php
    //引入开奖后台文件
    require_once "./game_prize.php";

    //获取前端数据
    $num=(int)$_POST["num"]; 
    $bs=(int)$_POST["bs"];
    $od=(int)$_POST["od"];
    $zodiac=(int)$_POST["zodiac"];
    // echo $num,$bs,$od,$zodiac;

    //1=中奖  0=未中奖
    echo "本期出奖号码是 $n !\n";

    if (num($num)==1){
        echo "号码:中奖\n";
    }else{
        echo "号码:未中奖\n";
    }
    
    if (od($od)==1){
        echo "大小:中奖\n";
    }else{
        echo "大小:未中奖\n";
    }

    if (bs($bs)==1){
        echo "单双:中奖\n";
    }else{
        echo "单双:未中奖\n";
    }

    if (zodiac($zodiac)==1){
        echo "生肖:中奖\n";
    }else{
        echo "生肖:未中奖\n";
    }
    ?>
    