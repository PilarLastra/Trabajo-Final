<?php
require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() != "company") {
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
		</script>";
}
require_once('nav-company.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/busquedaOfertas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main>
        <div class="container">


            <div class="tabla">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Puesto</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Sueldo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Experiencia</th>
                            <th scope="col">Idioma</th>
                            <th scope="col">Idioma Secundario</th>
                            <th scope="col">Tipo</th>
                            <th scope="col"></th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jobOfferList as $jobOffer) {
                            if ($jobOffer->getCompanyId() == $_SESSION['loggedUser']->getCompanyId()) {
                        ?>



                                <tr>
                                    <td><?php echo $jobOffer->getJobPositionId() ?></td>
                                    <td><?php echo $jobOffer->getCareerId() ?></td>
                                    <td><?php echo $jobOffer->getSalary() ?></td>
                                    <td><?php echo $jobOffer->getDescription() ?></td>
                                    <td><?php echo $jobOffer->getTurn() ?></td>
                                    <td><?php echo $jobOffer->getExp() ?></td>
                                    <td><?php echo $jobOffer->getLang() ?></td>
                                    <td><?php echo $jobOffer->getPrefLang() ?></td>
                                    <td><?php echo $jobOffer->getPlace() ?></td>
                                    <?php

                                    ?>


                                    <form action="<?php echo FRONT_ROOT . "/JobOffer/Modify" ?>" method="post">
                                        <td><input type="hidden" name="job_Offer_Id" id="job_Offer_Id" value="<?php echo $jobOffer->getJobOfferId(); ?>">
                                            <button class="btn btn-outline-light3" type="submit" name="">Modificar</button>
                                        </td>

                                    </form>
                            <?php }
                        } ?>
                                </tr>
                    </tbody>
                </table>
            </div>

            </form>
        </div>

        </div>
    </main>
</body>

</html>