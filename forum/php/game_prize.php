<?php
    //定义号段类型
    $n=rand(1,49);
    $tiger=array(1,13,25,37,49);
    $cattle=array(2,14,26,38);
    $rat=array(3,15,27,39);
    $pig=array(4,16,28,40);
    $dog=array(5,17,29,41);
    $chicken=array(6,18,30,42);
    $monkey=array(7,19,31,43);
    $sheep=array(8,20,32,44);
    $horse=array(9,21,33,45);
    $snake=array(10,22,34,46);
    $dragon=array(11,23,35,47);
    $rabbit=array(12,24,36,48);
    $small=array();
    $big=array();
    $one=array();
    $double=array();
    for($i=1;$i<26;$i++){
        $small[]=$i;
    }
    for($i=26;$i<50;$i++){
        $big[]=$i;
    }
    for($i=1;$i<50;$i=$i+2){
        $one[]=$i;
    }
    for($i=2;$i<50;$i=$i+2){
        $double[]=$i;
    }

    //押号码
    function num($num){
        global $n;
        if ($num == $n){ 
            return 1;
        }else{
            return 0;
        }
    }

    //押大小
    function bs($bs){   //1=大,0=小
        global $n,$small,$big;
        $bigres=$smallres=2;      //bigres只能是1，2        smallres只能是0，2
        $res=0; //1=开，0=关
        if (in_array($n,$big)){
        $bigres=1;
        }elseif (in_array($n,$small)){
        $smallres=0;
        }
        if ($bs == $bigres){
            $res=1;
        }elseif ($bs == $smallres){
            $res=1;
        }
        if ($res == 1){
            return 1;
        }else{
            return 0;
        }
    }

    //押单双
    function od($od){   //1=单,0=双
        global $n,$one,$double;
        $oneres=$doubleres=2;      //oneres只能是1，2       doubleres只能是0，2
        $res=0; //1=开，0=关
        if (in_array($n,$one)){
        $oneres=1;
        }elseif (in_array($n,$double)){
        $doubleres=0;
        }
        if ($od == $oneres){
            $res=1;
        }elseif ($od == $doubleres){
            $res=1;
        }
        if ($res == 1){
            return 1;
        }else{
            return 0;
        }
    }

    //押生肖
    function zodiac($zodiac){
        global $n,$tiger,$cattle,$rat,$pig,$dog,$chicken,$monkey,$sheep,$horse,$snake,$dragon,$rabbit;
        $tigerres=$cattleres=$ratres=$pigres=$dogres=$chickenres=$monkeyres=$sheepres=$horseres=$snakeres=$dragonres=$rabbitres=99;
        $res=0;
        if (in_array($n,$tiger)){
            $tigerres=1;
        }elseif(in_array($n,$cattle)){
            $cattleres=2;
        }elseif(in_array($n,$rat)){
            $ratres=3;
        }elseif(in_array($n,$pig)){
            $pigres=4;
        }elseif(in_array($n,$dog)){
            $dogres=5;
        }elseif(in_array($n,$chicken)){
            $chickenres=6;
        }elseif(in_array($n,$monkey)){
            $monkeyres=7;
        }elseif(in_array($n,$sheep)){
            $sheepres=8;
        }elseif(in_array($n,$horse)){
            $horseres=9;
        }elseif(in_array($n,$snake)){
            $snakeres=10;
        }elseif(in_array($n,$dragon)){
            $dragonres=11;
        }elseif(in_array($n,$rabbit)){
            $rabbitres=12;
        }
        if ($zodiac == $tigerres){
            $res=1;
        }elseif ($zodiac == $cattleres){
            $res=1;
        }elseif ($zodiac == $ratres){
            $res=1;
        }elseif ($zodiac == $pigres){
            $res=1;
        }elseif ($zodiac == $dogres){
            $res=1;
        }elseif ($zodiac == $chickenres){
            $res=1;
        }elseif ($zodiac == $monkeyres){
            $res=1;
        }elseif ($zodiac == $sheepres){
            $res=1;
        }elseif ($zodiac == $horseres){
            $res=1;
        }elseif ($zodiac == $snakeres){
            $res=1;
        }elseif ($zodiac == $dragonres){
            $res=1;
        }elseif ($zodiac == $rabbitres){
            $res=1;
        }
        if ($res == 1){
            return 1;
        }else{
            return 0;
        }
    }
    // if (in_array($num,$tiger)){
    //     echo "tiger";
    // }elseif(in_array($num,$cattle)){
    //     echo "cattle";
    // }elseif(in_array($num,$rat)){
    //     echo "rat";
    // }elseif(in_array($num,$pig)){
    //     echo "pig";
    // }elseif(in_array($num,$dog)){
    //     echo "dog";
    // }elseif(in_array($num,$chicken)){
    //     echo "chicken";
    // }elseif(in_array($num,$monkey)){
    //     echo "monkey";
    // }elseif(in_array($num,$sheep)){
    //     echo "sheep";
    // }elseif(in_array($num,$horse)){
    //     echo "horse";
    // }elseif(in_array($num,$snake)){
    //     echo "snake";
    // }elseif(in_array($num,$dragon)){
    //     echo "dragon";
    // }elseif(in_array($num,$rabbit)){
    //     echo "rabbit";
    // }
    // if(in_array($num,$small)){
    //     echo "small";
    // }elseif(in_array($num,$big)){
    //     echo "big";
    // }
    // if(in_array($num,$one)){
    //     echo "one";
    // }elseif(in_array($num,$double)){
    //     echo "double";
    // }
    // echo $num;
?>