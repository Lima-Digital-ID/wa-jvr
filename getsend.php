<?php
include_once("./helper/koneksi.php");
include_once("./helper/function.php");
$number = $_GET['number'];
$msg = $_GET['message'];
$api_key = $_GET['apikey'];

if($api_key != api_key()){
    $ret['status'] = false;
    $ret['msg'] = "Api key wrong";
    echo json_encode($ret, true);
    exit;
}

$send = sendMSG($number, $msg);
if ($send['status'] == "true"){
    $ret['status'] = true;
    $ret['msg'] = "Message sent successfully";
    echo json_encode($ret, JSON_PRETTY_PRINT);
    exit;
}else{
    $ret['status'] = true;
    $ret['msg'] = "Message sent failed";
    echo json_encode($ret, JSON_PRETTY_PRINT);
    exit;
}


?>