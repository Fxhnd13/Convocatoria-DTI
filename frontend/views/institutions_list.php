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
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Institución</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['institutions'] as $institution) { ?>
                        <tr>
                        <th scope="row"><?php echo $institution['id_institution'] ?></th>
                        <td><?php echo $institution['institution'] ?></td>
                        <td class='d-flex justify-content-center'>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                <form action='../services/institution_service.php' method='GET'>
                                    <input type='number' id='id_institution' name='id_institution' value='<?php echo $institution['id_institution'] ?>' hidden>
                                    <button class="btn btn-outline-warning" type='submit' name='action' value='one'>Editar</button>
                                </form>
                                <form action='../services/institution_service.php' method='POST'>
                                    <input type='number' id='id_institution' name='id_institution' value='<?php echo $institution['id_institution'] ?>' hidden>
                                    <button type="button" class="btn btn-outline-danger" name='action' value='delete'>Eliminar</button>
                                </form>
                            </div>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>