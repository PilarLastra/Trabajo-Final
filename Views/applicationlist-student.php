<?php

use DAO\JobOfferDAO;
use DAO\JobPositionDAO;

require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
}

$jobOfferDAO = new JobOfferDAO();
$jobApplicationDAO = new JobPositionDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/AgregarEmpresaTrabajo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<body style="background-color:#7B68EE">
    <main>
        <div class="search">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" name="nombre" aria-label="Search">
                        <button class="btn btn-light" id="boton" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="tabla">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">CV</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobApplicationList as $jobApplication) {

                            foreach ($jobOfferList as $jobOffer) {
                                if ($jobOffer->getJobOfferId() == $jobApplication->getJobOfferId()) {
                        ?> <tr>
                                        <td><?php echo $this->jobApplicationDAO->MatchByStudId($jobApplication->getStudentId()) ?></td>
                                        <td><?php echo  $jobOfferDAO->MatchByCompanyId($jobOffer->getCompanyId()) ?></td>
                                        <td><?php echo $jobOffer->getJobPositionId() ?></td>
                                        <td><?php echo $jobOffer->getCareerId() ?></td>
                                        <td><button class="btn btn-light" type="submit">PDF</button></td>
                            <?php }
                            }
                        } ?>


                                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>