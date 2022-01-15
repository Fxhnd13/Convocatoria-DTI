<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    <br><br>
    <main>
        <div class='container'>
            <table class="table table-bordered">
                <?php 
                if(isset($_SESSION['report_option'])){
                    if($_SESSION['report_option'] == '1') { ?>
                        <thead>
                            <tr>
                            <th scope="col">Cui</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Ultimo titulo obtenido</th>
                            <th scope="col">Año</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['values'] as $iterador) { ?>
                                <tr>
                                <th scope="row"><?php echo $iterador['cui'] ?></th>
                                <td><?php echo $iterador['name'] ?></td>
                                <td><?php echo $iterador['last_name'] ?></td>
                                <td><?php echo (isset($iterador['academic_achievements'][0])? $iterador['academic_achievements'][0]['tittle'] : 'Sin logros registrados') ?></td>
                                <td><?php echo (isset($iterador['academic_achievements'][0])? $iterador['academic_achievements'][0]['year'] :   '----') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } else if ($_SESSION['report_option'] == '2') { ?>
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Area</th>
                            <th scope="col">Cantidad de personas que poseen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['values'] as $iterador) { ?>
                                <tr>
                                <th scope="row"><?php echo $iterador['id_area'] ?></th>
                                <td><?php echo $iterador['performance_area'] ?></td>
                                <td><?php echo $iterador['person_count'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } 
                } else { ?>
                    <h1>No se ha seleccionado una vista</h1>
                <?php } ?>
            </table>
        </div>
    </main>

</body>
</html>