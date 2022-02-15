<?php

if ($_SESSION["loggedUser"]->getUserType() != "company") {
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
		</script>";
}
include("nav-company.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/perfil.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<body style="background-color:#7B68EE">
    <main>
        <div class="container">
            <div class="cover-image">
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#update-cover-image-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </button>
                <!–– Imagen de Portada ––>
            </div>
            <div class="profile-wrapper">
                <img class="foto" src="<?php echo IMG_PATH?>/foto default de usuario.png" alt="">
                <h1 class="userName"><?php echo $_SESSION['loggedUser']->getLegalName();?></h1>
            </div>
        </div>
        <nav class="mb-5">
        <ul class="nav justify-content-center">
          <li class="nav-item">
          <form action="<?php echo FRONT_ROOT . "/JobOffer/ShowAddView"?>" method = "post" class="nav-link text-white ">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg>
                  <button class="btn btn-outline-light" type="submit" name=""> Añadir oferta Laboral</button>
              </form>
          </li>
          <li class="nav-item">
              <form action="<?php echo FRONT_ROOT . "/Company/Modify"?>" method = "post" class="nav-link text-white ">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg>
                  <button class="btn btn-outline-light" type="submit" name=""> Modificar datos Empresa</button>
                  <input type="hidden" name="CUIL" id="CUIL" value="<?php echo $_SESSION['loggedUser']->getCUIL();?>">
              </form>
          </li>
          <li class="nav-item">
          <form action="<?php echo FRONT_ROOT . "/Company/ShowAppView"?>"  class="nav-link text-white ">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg>
                  <button class="btn btn-outline-light" type="submit" name=""> Ver listado aplicantes</button>
              </form>
          </li>
        </ul>
      </nav>
        <div>
            <div class="cuadradoEmpresa">
                <div>
                    <h1>Nuestro abordaje único abre paso a la reinvención</h1>
                    <p><?php echo $_SESSION['loggedUser']->getDescription(); ?></p>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <span><img src="<?php echo IMG_PATH ?>/Globant place holder.jpg" class="imagenGlobant" alt=""></span>
                            </div>
                            <div class="col">
                                <h2>Combinamos la ingeniería, la innovación y el diseño</h2>
                                <p class="texto-imagen"><?php echo $_SESSION['loggedUser']->getDescription(); ?></p>
                                <form action="https://www.globant.com/es">
                                    <input type="submit" class="btn btn-outline-secondary" value="Conocer mas">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cuadrado2">
                <div>
                    <h3>Algunos de los clientes con los que trabajamos</h3>
                    <nav class="mb-5">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    </svg>
                                    <img class="logoCoca" src="<?php echo IMG_PATH ?>/coca-cola-logo-1.png" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                        <use xlink:href="#people-circle" />
                                    </svg>
                                    <img class="logoFOX" src="<?php echo IMG_PATH ?>/FOX_ESPAÑA_LOGO.png" alt="">
                                </a>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    </svg>
                                    <img class="logoDisney" src="<?php echo IMG_PATH ?>/Disney+_logo.svg.png" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">
                                    <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    </svg>
                                    <img class="logoNational" src="<?php echo IMG_PATH ?>/national-geographic-logo.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="cuadrado3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Contactos</h4>
                            <p class="linea-chiquita"></p>
                            <a href="https://<?php echo $_SESSION['loggedUser']->getWeb(); ?>">
                                <p class="contactos"><?php echo $_SESSION['loggedUser']->getWeb(); ?></p>
                            </a>
                            <p class="contactos"><?php echo $_SESSION['loggedUser']->getEmail(); ?></p>
                            <p class="contactos"><?php echo $_SESSION['loggedUser']->getContactNumber(); ?></p>
                        </div>
                        <div class="col">
                            <h4>Ubicacion</h4>
                            <p class="linea-chiquita"></p>
                            <p class="contactos"><?php echo $_SESSION['loggedUser']->getProvince(); ?></p>
                            <p class="contactos"><?php echo $_SESSION['loggedUser']->getLocation(); ?></p>
                            <p class="contactos"><?php echo $_SESSION['loggedUser']->getAddress(); ?></p>
                        </div>
                    </div>
                </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="update-cover-image-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form para actializarb la imagen -->
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>