<?php

use DAO\JobOfferDAO;
use DAO\Connection as Connection;
use DAO\ImagenDAO as imagenDAO;

require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
}

$jobOfferDAO = new JobOfferDAO();
$imagenDAO = new imagenDAO();




?>
<!DOCTYPE html>
<html lang="en">

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    #aplicar {
        position: inherit;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/busquedaOfertas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<script type="text/javascript">
    function ConfirmAccept(){
        var respuesta = confirm ("Continuar con la propuesta?");
        if (respuesta == true){
            return true;
        }
        else{
            return false;
        }
    }
</script>

<body style="background-color:#7B68EE">
    <main>


        <?php foreach ($jobOfferList as $jobOffer) {
            if ($jobOffer->getJobOfferId() == $_POST["jobOfferId"]) { ?>
                <main>
                    <div class="container py-4">
                        <header class="pb-3 mb-4 border-bottom">
                            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">


                            </a>
                        </header>

                        <div class="p-5 mb-4 bg-light rounded-3">
                            <div class="container-fluid py-5">
                                <div class="row align-items-md-stretch">
                                    <div class="col-md-6">

                                        <h1 class="display-5 fw-bold"><?php echo $jobOfferDAO->MatchByCompanyId($jobOffer->getCompanyId()) ?></h1>
                                        <p class="col-md-8 fs-4"><?php echo $jobOffer->getJobPositionId() ?> <br>
                                            <?php echo $jobOffer->getCareerId() ?><br>
                                            Se requiere experiencia: <?php echo $jobOffer->getExp() ?><br>
                                            Turno de Trabajo: <?php echo $jobOffer->getTurn() ?><br>
                                            Monto Salarial: <?php echo $jobOffer->getSalary() ?><br>
                                            Idioma Principal: <?php echo $jobOffer->getLang() ?><br>
                                            Idioma Secundario: <?php echo $jobOffer->getPrefLang() ?><br>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                    <?php $img = $imagenDAO->traerImagenxId($jobOffer->getImagenId());
                                        foreach ($img as $row) {
                                            $ruta = str_replace(' ', '', $row['imagen']); ?>


                                            <img src="<?php echo  FRONT_ROOT . "/imagenes/$ruta" ?>" class="img-thumbnail" alt="...">

                                        <?php } ?>}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row align-items-md-stretch">

                        <div class="col-md-6">
                            <form action="<?php echo  FRONT_ROOT . "/JobApplication/Add " ?>" method="post">
                                <div class="h-100 p-5 text-white bg-dark rounded-3">
                                    <h2>Aplicar</h2>
                                    <p>Si esta interesado en esta oferta laboral por favor aplique a la misma</p>


                                    <input type="hidden" name="studentId" value="<?php echo $_SESSION["loggedUser"]->getStudentId(); ?>">
                                    <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getJobOfferId(); ?>">
                                    <input class="btn btn-outline-secondary"  id="aplicar" name="" type="submit" onclick="return ConfirmAccept()" value="Aplicar ">


                                </div>
                            </form>
                        </div>
                        </div>

                        <footer class="pt-3 mt-4 text-muted border-top">
                            &copy; 2021
                        </footer>
                    </div>
                </main>

        <?php }
        }  ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>