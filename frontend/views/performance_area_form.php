<?php session_start(); ?>
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
                <br><br><br><br>
                <?php if(isset($_SESSION['performance_area'])){ ?>
                    <center>
                        <legend>Editar area de desempeño</legend><br><br>
                        <form class='form-control' action="../services/performance_area_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="id_area">Id area</label>
                                <input type="number" class="form-control" id="id_area" name="id_area" required value='<?php echo $_SESSION['performance_area']['id_area'] ?>' readonly>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="performance_area">Area de desempeño</label>
                                <input type="text" class="form-control" id="performance_area" name="performance_area" value='<?php echo $_SESSION['performance_area']['performance_area'] ?>' required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <button class="col-md-6 btn btn-dark btn-lg btn-block" type="submit" name='action' value='update'>Crear area de desempeño</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } else { ?>
                    <center>
                        <legend>Registrar area de desempeño</legend><br><br>
                        <form class='form-control' action="../services/performance_area_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="performance_area">Area de desempeño</label>
                                <input type="text" class="form-control" id="performance_area" name="performance_area" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <button class="col-md-6 btn btn-dark btn-lg btn-block" type="submit" name='action' value='create'>Crear area de desempeño</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } ?>
            </div>
        </div>

    </body>
</html>