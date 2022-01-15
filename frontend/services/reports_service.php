<?php 
session_start();
include_once '../services/url_route.php';
$_SESSION['report_option'] = $_GET['report_option'];

if($_GET['report_option'] == '1'){

    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => ['Content-Type: application/x-www-form-urlencoded']
        )
    );

    $context  = stream_context_create($opts);

    $result = json_decode(file_get_contents($URL_GLOBAL.'/people', false, $context), true);
//Si es para actualizar
}else if($_GET['report_option'] == '2'){

    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => ['Content-Type: application/x-www-form-urlencoded'],
        )
    );
    $context  = stream_context_create($opts);
    $result = json_decode(file_get_contents($URL_GLOBAL.'/do_performance_area_report', false, $context), true);
} else{
    unset($_SESSION['report_option']);
    header('location: '. '../views/index.php');
}

if(isset($result)){
    $_SESSION['values'] = $result;
    header('location: ' . '../views/index.php');
}
?>