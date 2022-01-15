<?php 
    include "url_route.php";
    session_start();

    //Si es una solicitud post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Si es post para crear
        if($_POST['action'] == 'create'){

            $data = http_build_query(
                array('performance_area' => $_POST['performance_area'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/performance_area', false, $context), true);
        //Si es para actualizar
        }else if($_POST['action'] == 'update'){

            $data = http_build_query(
                array('performance_area' => $_POST['performance_area'],'id_area'=>$_POST['id_area'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'PUT',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/performance_area', false, $context), true);
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
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/performance_areas', false, $context), true);
            
            if(isset($result)){
                $_SESSION['performance_areas'] = $result;
                header('location: ' . '../views/performance_areas_list.php');
            }
        }else if($_GET['action'] == 'one'){
            $data = http_build_query(
                array('id_area' => $_GET['id_area'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/performance_area', false, $context), true);
            
            if(isset($result)){
                $_SESSION['performance_area'] = $result;
                header('location: ' . '../views/performance_area_form.php');
            }
        }

    }
?>