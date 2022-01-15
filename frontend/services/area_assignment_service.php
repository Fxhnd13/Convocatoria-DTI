<?php 
    include "url_route.php";
    session_start();

    //Si es una solicitud post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Si es post para crear
        if($_POST['action'] == 'create'){

            $data = http_build_query(
                array('id_area' => $_POST['id_area'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded','token:'.$_SESSION['token']],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/area_assignment', false, $context), true);
        //Si es para actualizar
        }else if($_POST['action'] == 'delete'){

            $data = http_build_query(
                array('id_assignment' => $_POST['id_assignment'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'DELETE',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded','token:'.$_SESSION['token']],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/area_assignment', false, $context), true);
        }
        
        if(isset($result)){
            $_SESSION['last_status'] = $result['status'];
            $_SESSION['information_message'] = $result['information_message'];
            header('location: ' . '../views/index.php');
        }

    }
?>