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

                <form action="<?php echo  FRONT_ROOT . "/Admin/Add " ?>" method="post">

                    <div>
                        <h1>Nuevo Admin</h1>
                        <h2 id="linea"></h2>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col">

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Nombre</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">DNI</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Fecha de nacimiento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Numero de telefono</label>
                                </div>




                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Apellido</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Genero</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>



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