<?php 
    session_start(); 
    include_once('../services/url_route.php');
    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => ['Content-Type: application/x-www-form-urlencoded']
        )
    );
    $context  = stream_context_create($opts);
    $result = json_decode(file_get_contents($URL_GLOBAL.'/performance_areas', false, $context), true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" type="text/css"/>
    
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>Formulario Contrato</title>
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
        <div class="row container-fluid">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br><br><br>
                <center>
                    <legend>Registro de area de desempeño</legend><br><br>
                    <form class='form-control' action="../services/area_assignment_service.php" method="post">
                        <br>
                        <div class="row container col-md-8">
                            <label for="id_area">Area</label>
                            <select class="form-select" aria-label="Default select example" id="id_area" name="id_area" required>
                                <?php foreach ($result as $iterator){ ?>
                                    <option value="<?php echo $iterator['id_area'] ?>"><?php echo $iterator['performance_area'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <button class="col-md-4 btn btn-dark btn-lg btn-block" type="submit" name='action' value='create'>Agregar area de desempeño</button>
                        </div>
                        <br>
                    </form>
                </center>
            </div>
        </div>

    </body>
</html>