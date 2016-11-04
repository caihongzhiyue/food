<?php
    //如果出现乱码，从四个方面着手：文件  页面  请求  地址
    header("Access-Control-Allow-Origin:*");
    header('Content-type:text/html;charset=utf-8');//加入header
    $ch = curl_init();
    $url = 'http://apis.baidu.com/tngou/info/classify';
    $header = array(
        'apikey: 4987dfa8c4d230693ffefc86e1f48632',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

   // var_dump(json_decode($res));  //类似一个js中congsole.table(object)

    $result = json_decode($res,true);//json_decode见对象转换
    echo json_encode($result);//echo是内容输出，将$result这个对象返回json对象
?>