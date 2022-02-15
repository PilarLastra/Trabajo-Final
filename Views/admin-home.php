<?php

if ($_SESSION["loggedUser"]->getUserType() != "admin") {
  echo "<script> if(confirm('Acceso incorrecto'));";
  echo "window.location = '../index.php';
		</script>";
}
include("nav.php");

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
        <img class="foto" src="<?php echo IMG_PATH ?>/foto default de usuario.png" alt="">
        <h1 class="userName"><?php echo $_SESSION['loggedUser']->getName() . '  ' . $_SESSION['loggedUser']->getLastName(); ?></h1>
        <h2 class="linea1"></h2>
      </div>
      <nav class="mb-5">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/Company/ShowListView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Ver Empresas
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/Company/ShowAddView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Añadir Empresa
            </a>
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/JobOffer/ShowAddView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Añadir oferta Laboral
            </a>
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/Student/ShowListView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Ver Listado Estudiantes
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/Admin/ShowAddView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Añadir admin
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo FRONT_ROOT . "/Admin/ShowAppView" ?>" class="nav-link text-white">
              <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                <use xlink:href="#people-circle" />
              </svg>
              Aplicaciones
            </a>
          </li>
        </ul>
      </nav>
      <section>

      </section>
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
          <form action="<?php echo  FRONT_ROOT . "/Admin/AddImg" ?>" method="POST" enctype="multipart/form-data">
            Añadir imagen: <input name="archivo" id="archivo" type="file" />
            <input type="submit" id="subir" value="Subir imagen" />
          </form>
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