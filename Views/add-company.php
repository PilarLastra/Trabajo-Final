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
                                <div class="form-floating mb-3">
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



                    <div class="col-15">  
                                                            <div class="modal fade" id="add" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="add"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Esta seguro que desea agregar esta compañia?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal">Si</button>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal fade" id="add" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="add"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Compañia añadida con exito
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-outline-light" data-bs-toggle="modal" type="submit" href="#add" role="button">Agregar</a>
             
                                                             </div>
                    
                    </form>
                
            </div>
        </div>










    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>