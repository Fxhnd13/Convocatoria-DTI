<?php 
    include "url_route.php";
    session_start();

    //Si es una solicitud post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Si es post para crear
        if($_POST['action'] == 'create'){

            $data = http_build_query(
                array(
                    'cui' => $_POST['cui'],
                    'name' => $_POST['name'],
                    'last_name' => $_POST['last_name'],
                    'address' => $_POST['address'],
                    'phone_number' => $_POST['phone_number'],
                    'birth_day' => $_POST['birth_day'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                )
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded'],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/person', false, $context), true);
        //Si es para actualizar
        }else if($_POST['action'] == 'update'){

            $data = http_build_query(
                array(
                    'cui' => $_POST['cui'],
                    'name' => $_POST['name'],
                    'last_name' => $_POST['last_name'],
                    'address' => $_POST['address'],
                    'phone_number' => $_POST['phone_number'],
                    'birth_day' => $_POST['birth_day']
                )
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'PUT',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded','token:'.$_SESSION['token']],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/person', false, $context), true);
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
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/people', false, $context), true);
            
            if(isset($result)){
                $_SESSION['people'] = $result;
                header('location: ' . '../views/index.php');
            }
        }else if($_GET['action'] == 'one'){
            $data = http_build_query(
                array('cui' => $_GET['cui'])
            );
        
            $opts = array('http' =>
                array(
                    'method'  => 'GET',
                    'header'  => ['Content-Type: application/x-www-form-urlencoded','token:'.$_SESSION['token']],
                    'content' => $data
                )
            );
        
            $context  = stream_context_create($opts);
        
            $result = json_decode(file_get_contents($URL_GLOBAL.'/person', false, $context), true);
            
            if(isset($result)){
                $_SESSION['person'] = $result['person'];
                $_SESSION['achievements'] = $result['achievements'];
                $_SESSION['areas'] = $result['areas'];
                if(isset($_GET['is_edit'])){
                    header('location: ' . '../views/person_form.php');
                }else{
                    header('location: ' . '../views/profile.php');
                }
            }
        }

    }
?>