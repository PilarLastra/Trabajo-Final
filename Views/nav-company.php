<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="overides.css" type="text/css">
    <link rel="stylesheet" href="perfil.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?php echo IMG_PATH ?>/logoNegro.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo FRONT_ROOT . "/JobOffer/ShowListViewxCompany"?>">Propuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo FRONT_ROOT . "/Home/ShowCompanyView" ?>" class="nav-link active">Mi Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo  FRONT_ROOT . "/Session/Logout" ?>" class="nav-link active">LogOut</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
