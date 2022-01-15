<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </head>
  <body>
        <?php include_once("navBar.php"); ?>
        <br><br>
        <div class="container card">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <h3>Nombre: <?php echo $_SESSION['person']['name'].' '.$_SESSION['person']['last_name'] ?></h3>
                        <br>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Información personal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Logros academicos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Areas de desempeño</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                              <div class="row">
                                <div class="col-md-7">
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Cui: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p> <?php echo $_SESSION['person']['cui'] ?> </p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Nombre(s): </label>
                                      </div>
                                      <div class="col-md-7">
                                          <p> <?php echo $_SESSION['person']['name'] ?> </p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Apellido(s): </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p> <?php echo $_SESSION['person']['last_name'] ?> </p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label>Dirección: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p> <?php echo $_SESSION['person']['address'] ?> </p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-1"></div>
                                      <div class="col-md-4">
                                          <label> Fecha de nacimiento: </label>
                                      </div>
                                      <div class="col-md-7">
                                      <p> <?php echo $_SESSION['person']['birth_day'] ?> </p>
                                      </div>
                                  </div>
                                </div>
                                  <div class="col-md-4">
                                    <br>
                                    <h6>Opciones:</h6>
                                    <ul>
                                      <form action="../services/person_service.php" method="GET">
                                          <input type="number" name="cui" value="<?php $_SESSION['person']['cui'] ?>" hidden>
                                          <input type="text" name="is_edit" value="a" hidden>
                                        <li>
                                            <button class="btn btn-link" type="submit" name="action" value="one">Editar Informacion</button>
                                        </li>
                                      </form>
                                      <li>
                                        <button class="btn btn-link" data-toggle="modal" data-target="#EliminarCuenta">Eliminar Perfil</button>
                                      </li>
                                    </ul>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class='container'>
                                    <br>
                                    <div class='d-flex justify-content-end'>
                                      <a href="academic_achievement_form.php" class="btn btn-outline-success">Agregar +</a>
                                    </div>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Año</th>
                                            <th scope="col">Institución</th>
                                            <th scope='col'>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <?php foreach ($_SESSION['achievements'] as $iterador) { ?>
                                                  <tr>
                                                  <th scope="row"><?php echo $iterador['id_achievement'] ?></th>
                                                  <td><?php echo $iterador['tittle'] ?></td>
                                                  <td><?php echo $iterador['year'] ?></td>
                                                  <td><?php echo $iterador['institution']['institution'] ?></td>
                                                  <td class='d-flex justify-content-center'>
                                                      <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                                          <form action='../services/academic_achievement_service.php' method='POST'>
                                                              <input type='number' name='id_achievement' value='<?php echo $iterador['id_achievement'] ?>' hidden>
                                                              <button type="submit" class="btn btn-outline-danger" name='action' value='delete'>Eliminar</button>
                                                          </form>
                                                      </div>
                                                  </td>
                                                  </tr>
                                              <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class='container'>
                                    <br>
                                    <div class='d-flex justify-content-end'>
                                      <a href="area_assignment_form.php" class="btn btn-outline-success">Agregar +</a>
                                    </div>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Area de desempeño</th>
                                            <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <?php foreach ($_SESSION['areas'] as $iterador) { ?>
                                                  <tr>
                                                  <th scope="row"><?php echo $iterador['id_assignment'] ?></th>
                                                  <td><?php echo $iterador['performance_area']['performance_area'] ?></td>
                                                  <td class='d-flex justify-content-center'>
                                                      <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                                          <form action='../services/area_assignment_service.php' method='POST'>
                                                              <input type='number' name='id_assignment' value='<?php echo $iterador['id_assignment'] ?>' hidden>
                                                              <button type="submit" class="btn btn-outline-danger" name='action' value='delete'>Eliminar</button>
                                                          </form>
                                                      </div>
                                                  </td>
                                                  </tr>
                                              <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

  </body>
</html>