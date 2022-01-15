<?php 
include "url_route.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = http_build_query(
        array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
            )
    );

    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $data
        )
    );

    $context  = stream_context_create($opts);

    $result = json_decode(file_get_contents($URL_GLOBAL.'/login', false, $context), true);


    // print_r($obj);
    if(isset($result)){
        if($result['status'] == '200'){
            session_start();
            $_SESSION['cui'] = $result['cui'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['token'] = $result['token'];
            header('location: ' . '../views/index.php');
        }else{
            header('location: ' . '../views/login.php');
        }
    }

}

?>