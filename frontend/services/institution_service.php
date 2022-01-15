<?php 
    include "url_route.php";
    session_start();

    //Si es una solicitud post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Si es post para crear
        if($_POST['action'] == 'create'){

            $data = http_build_query(
                array('institution' => $_POST['institution'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/institution', false, $context), true);
        //Si es para actualizar
        }else if($_POST['action'] == 'update'){

            $data = http_build_query(
                array('institution' => $_POST['institution'],'id_institution'=>$_POST['id_institution'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'PUT',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded','token:'.$_SESSION['token']],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/institution', false, $context), true);
        }
        
        if(isset($result)){
            $_SESSION['last_status'] = $result['status'];
            $_SESSION['information_message'] = $result['information_message'];
            header('location: ' . '../views/index.php');
        }

    }else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if($_GET['action'] == 'all'){
        
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded']
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/institutions', false, $context), true);
            
            if(isset($result)){
                $_SESSION['institutions'] = $result;
                header('location: ' . '../views/institutions_list.php');
            }
        }else if($_GET['action'] == 'one'){
            $data = http_build_query(
                array('id_institution' => $_GET['id_institution'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/institution', false, $context), true);
            
            if(isset($result)){
                $_SESSION['institution'] = $result;
                header('location: ' . '../views/institution_form.php');
            }
        }

    }
?>