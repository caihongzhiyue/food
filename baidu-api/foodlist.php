<?php
//如果出现乱码，回过头去查看四个方面的内容：1.文件，2.页面，3.请求，4.地址
    header("Access-Control-Allow-Origin:*");
    header('Content-type:text/html;charset=utf-8');

    //可以通过$_GET['id']去获取url里的参数
    $id = $_GET["id"]?$_GET["id"]:0;
    $page = $_GET["page"]?$_GET["page"]:1;
    $rows = $_GET["rows"]?$_GET["rows"]:30;

    $ch = curl_init();
    $url = 'http://apis.baidu.com/tngou/cook/list?id='.$id.'&page='.$page.'&rows=' .$rows;
    $header = array(
        'apikey: 93f6a5623f11c4d9173020e9321052b8',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    
    //var_dump(json_decode($res)); //var_dump它是一个类似于js里console.table(object)

    $result =  json_decode($res,true); // json_decode，将对象转换
    echo json_encode($result); //echo是内容输出,将$result这个对象转化json对象
?>