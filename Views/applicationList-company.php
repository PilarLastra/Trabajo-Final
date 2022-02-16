<?php

use DAO\ArchivoDAO;
use DAO\JobOfferDAO;
use DAO\JobPositionDAO;

require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "company") {
    require_once('nav-company.php');
} 
else{
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
</script>";
}

$jobOfferDAO = new JobOfferDAO();
$jobApplicationDAO = new JobPositionDAO();
$archivoDAO = new ArchivoDAO();
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
                    <form  class="d-flex">
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
                            <th scope="col">Carrera</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">CV</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jobApplicationList as $jobApplication){
                           
                        foreach ($jobOfferList as $jobOffer) {
                                            if ($jobOffer->getJobOfferId() == $jobApplication->getJobOfferId()) { 
                                                if($_SESSION['loggedUser']->getCompanyId() == $jobOffer->getCompanyId()){
                                ?>      <tr>
                                                <td><?php echo $this->jobApplicationDAO->MatchByStudId($jobApplication->getStudentId())?></td>
                                                <td><?php echo $this->jobApplicationDAO->GetCareerById($jobApplication->getStudentId())?></td>
                                                    <td><?php echo  $jobOfferDAO->MatchByCompanyId($jobOffer->getCompanyId()) ?></td>
                                                    <td><?php echo $jobOffer->getJobPositionId() ?></td>
                                                    <td><?php echo $jobOffer->getCareerId() ?></td>

                                                    <td>
                                                            <?php 
                                                                if($jobApplication->getCvId() != 5){
                                                            $cv  = $this->archivoDAO->DownloadCV($jobApplication->getCvId());
                                                                    $rutaDescarga = "../upload/".$cv[0]['ruta'];
                                                                    $rutaDescarga = str_replace(' ', '', $rutaDescarga);
                                                                     $nombreArchivo = $cv[0]['name'];
                                                                    
                                                            
                                                            ?>
                                                    <a href="<?php echo $rutaDescarga;?>" download="<?php echo $nombreArchivo;?>" class="btn btn-">CV</a></td>

                                               
                                                   
                                                    <?php }else{
                                                        ?>No presento
                                                        <?php
                                                    }}
                                                    }
                                                }
                        }?>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
