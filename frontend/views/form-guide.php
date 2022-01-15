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
        <div class="row container-fluid">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br>
                <center>
                    <legend>Formulario Contrato</legend>  
                </center>
                <form action="crudContratos" method="post">
                    <div class="row container">
                        <label for="cui">Cui</label>
                        <input type="number" class="form-control" id="cui" name="cui" required>
                    </div>
                    <br>
                    <div class="row container">
                        <label for="nombreCompleto">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
                    </div>
                    <br>
                    <div class="row container">
                        <label for="sueldo">Sueldo</label>
                        <input type="number" class="form-control" id="sueldo" name="sueldo" required>
                    </div>
                    <br>
                    <div class="row container">
                        <label for="area">Area</label>
                        <select id="area" name="area" class="form-control">
                            <% for (Area area : RegistroAreas.getListadoAreas()) {%>
                            <option value="<%=area.getId()%>"><%=area.getNombre()%></option>
                            <% }%>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <button class="col-md-4 btn btn-primary btn-lg btn-block" type="submit" value="crear" name="crud">Crear Contrato</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>

    </body>
</html>