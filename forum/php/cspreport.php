<?php
    $time = date('Y-m-d H:i:s');
    $file = fopen('../file/cspreport.txt', 'a');
    $data = file_get_contents('php://input');   // 利用伪协议取得请求内容
    $json = json_decode($data, true);           // true表示生成关联数组
    fwrite($file, 'report-time: ' . $time . "\r\n");
    foreach ($json['csp-report'] as $key => $value) {
        fwrite($file, $key . ": " . $value . "\r\n");
    }
    fwrite($file, "\r\n----------------------------\r\n\r\n");
    fclose($file);
?>