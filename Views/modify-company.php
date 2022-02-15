<?php
if ($_SESSION["loggedUser"]->getUserType() == "admin"){
    include("nav.php");
  }
  else if ($_SESSION["loggedUser"]->getUserType() == "company"){
    include("nav-company.php");

  }
  else{
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
</script>";
  }
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/listaEmpresas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<body style="background-color:#7B68EE">
    <main>
        <form action="<?php echo FRONT_ROOT . "/Company/ModifyAttribute" ?>" method="post">
            <div class="container">
                <div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="legalName" placeholder="Nombre...">
                                <label for="floatingInput">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="address" placeholder="Direccion...">
                                <label for="floatingInput">Direccion</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="textarea" class="form-control" id="floatingInput" name="active" placeholder="si/no">
                                <label for="floatingInput">Activo(si/no)</label>
                            </div>


                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" name="contactNumber" placeholder="Numero contacto...">
                                <label for="floatingInput">Contacto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="password" placeholder="1234asda">
                                <label for="floatingInput">Password</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="web_Page" placeholder="name.com.ar">
                                <label for="floatingInput">Pagina Web</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="textarea" class="form-control" id="floatingInput" name="description" placeholder="Descripcion..">
                                <label for="floatingInput">Descripcion</label>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tabla">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Pagina Web</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Activo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($companyList as $company) {
                                    if ($company->getCUIL() == $_POST['CUIL']) { ?>
                                        <th scope="row"></th>
                                        <td><?php echo $company->getLegalName() ?></td>
                                        <td><?php echo $company->getDescription() ?></td>
                                        <td><?php echo $company->getEmail() ?></td>
                                        <td><?php echo $company->getContactNumber() ?></td>
                                        <td><?php echo $company->getWeb() ?></td>
                                        <td><?php echo $company->getAddress() ?></td>
                                        <td><?php echo $company->getActive() ?></td>
                            </tr>
                    <?php }
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="boton">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">

                    </div>

                    <div class="col">
                        
                    </div>

                    <div class="col-4">  
                    <div class="modal fade" id="modify" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modify"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Aplicar cambios?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-bs-target="#modify2" data-bs-toggle="modal">Si</button>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modify2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modify2"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Compañia modificada con exito
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input name="cuil" type="hidden" value="<?php echo $_POST['CUIL'] ?>">
                                                                <a class="btn btn-outline-light" data-bs-toggle="modal" type="submit" href="#modify" role="button">Modificar</a>
             
            
        </form>
        <div class="col-4"> 
                    <form action="<?php echo FRONT_ROOT . "/Company/Remove" ?>" method="post"> 
                     
                    <div class="modal fade" id="remove" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="remove"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                               Esta seguro que desea eliminar esta compañia?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-bs-target="#remove2" data-bs-toggle="modal">Si</button>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="remove2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="remove2"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Compañia eliminada con exito
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input name="CUIL" type="hidden" value="<?php echo $_POST['CUIL'] ?>">
                                                                <a class="btn btn-outline-light" data-bs-toggle="modal" type="submit" href="#remove" role="button">Eliminar</a>
                    </form>
                     <form action="<?php echo FRONT_ROOT . '/Home/Show'.$_SESSION['loggedUser']->getUserType().'View' ?>" method="get">
                         <input type="submit" class="btn btn-outline-light" value="Volver al inicio">
                    </form>
                </div>
            </div>
            </div>
            </div>
            
           
            
       
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>