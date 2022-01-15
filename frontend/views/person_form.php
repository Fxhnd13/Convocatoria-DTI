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
                <?php if(isset($_SESSION['person'])){ ?>
                    <center>
                        <legend>Editar datos personales</legend><br><br>
                        <form class='form-control' action="../services/person_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="cui">Cui:</label>
                                <input type="number" class="form-control" name="cui" value='<?php echo $_SESSION['person']['cui'] ?>' required readonly>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" value='<?php echo $_SESSION['person']['name'] ?>' required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="last_name">Apellido: </label>
                                <input type="text" class="form-control" name="last_name" value='<?php echo $_SESSION['person']['last_name'] ?>' required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="address">Direccion</label>
                                <input type="text" class="form-control" name="address" value='<?php echo $_SESSION['person']['address'] ?>' required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="phone_number">Numero de telefono</label>
                                <input type="number" class="form-control" name="phone_number" value='<?php echo $_SESSION['person']['phone_number'] ?>' required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="birth_day">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="birth_day" value='<?php echo $_SESSION['person']['birth_day'] ?>' required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <button class="col-md-6 btn btn-dark btn-lg btn-block" type="submit" name='action' value='update'>Editar tados personales</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } else { ?>
                    <center>
                        <legend>Registrar persona</legend><br><br>
                        <form class='form-control' action="../services/person_service.php" method="post">
                            <br>
                            <div class="row container col-md-8">
                                <label for="cui">Cui:</label>
                                <input type="number" class="form-control" name="cui" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="last_name">Apellido: </label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="address">Direccion</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="phone_number">Numero de telefono</label>
                                <input type="number" class="form-control" name="phone_number" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="birth_day">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="birth_day" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="username">Username: </label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <br>
                            <div class="row container col-md-8">
                                <label for="password">Password: </label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <button class="col-md-6 btn btn-dark btn-lg btn-block" type="submit" name='action' value='create'>Crear persona</button>
                            </div>
                            <br>
                        </form>
                    </center>
                <?php } ?>
            </div>
        </div>

    </body>
</html>