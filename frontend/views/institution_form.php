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
                <?php if(isset($_SESSION['institution'])){ ?>
                    <center>
                        <legend>Editar de Institución</legend><br><br>
                        <form class='form-control' action="../services/institution_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="id_institution">Id institución</label>
                                <input type="number" class="form-control" id="id_institution" name="id_institution" required value='<?php echo $_SESSION['institution']['id_institution'] ?>' readonly>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="institution">Institución</label>
                                <input type="text" class="form-control" id="institution" name="institution" required value='<?php echo $_SESSION['institution']['institution'] ?>'>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <button class="col-md-4 btn btn-dark btn-lg btn-block" type="submit" name='action' value='update'>Editar institución</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } else { ?> 
                    <center>
                        <legend>Registro de Institución</legend><br><br>
                        <form class='form-control' action="../services/institution_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="institution">Institución</label>
                                <input type="text" class="form-control" id="institution" name="institution" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <button class="col-md-4 btn btn-dark btn-lg btn-block" type="submit" name='action' value='create'>Crear institución</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } ?>
            </div>
        </div>

    </body>
</html>