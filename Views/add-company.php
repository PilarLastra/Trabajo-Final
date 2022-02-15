<?php

if ($_SESSION["loggedUser"]->getUserType() != "admin"){
    echo "<script> if(confirm('Acceso incorrecto'));";
              echo "window.location = '../index.php';
          </script>";
  }
include('nav.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/AgregarEmpresaTrabajo.css" type="text/css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main>
        <div class="container">
            <div id="cuadrado">

                <form action="<?php echo  FRONT_ROOT . "/Company/Add " ?>" method="post">

                    <div>
                        <h1>Nueva Empresa</h1>
                        <h2 id="linea"></h2>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="legalName" placeholder="Nombre">
                                    <label for="floatingInput">Nombre</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" name="cuil" placeholder="201231248">
                                    <label for="floatingInput">CUIL</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="web_Page" placeholder="name.com.ar">
                                    <label for="floatingInput">Pagina Web</label>
                                </div>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="floatingInput" name="contactNumber" placeholder="1234567">
                                    <label for="floatingInput">Numero de contacto</label>
                                </div>

                            </div>

                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="password" placeholder="nasdew789">
                                    <label for="floatingInput">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="textarea" class="form-control" id="floatingInput" name="description" placeholder="...">
                                    <label for="floatingInput">Descripcion</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="active" placeholder="si/no">
                                    <label for="floatingInput">Activo(si/no)</label>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <input type="text" id="color-letra" class="cuadrado-de-opciones" name="province" placeholder="Provincia" aria-label="City">
                            </div>
                            <div class="col">
                                <input type="text" id="color-letra" class="cuadrado-de-opciones" name="location" placeholder="Localidad" aria-label="State">
                            </div>
                            <div class="col">
                                <input type="text" id="color-letra" class="cuadrado-de-opciones" name="address" placeholder="Direccion" aria-label="Zip">
                            </div>
                        </div>
                    </div>



                    <div class="form-floating">
                        <input type="submit" id="margen-boton" class="btn btn-outline-light" value="Agregar">
                    </div>

            </div class="alert alert-<?php echo $alert->getType() ?>">
            <?php echo $alert->getMessage(); ?>
            <div>
                </form>
            </div>
        </div>










    </main>
</body>

</html>