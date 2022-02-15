<?php

use DAO\JobOfferDAO;

require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
}

$jobOfferDAO = new JobOfferDAO();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/busquedaOfertas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<script type="text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm ("Esta seguro que desea cancelar esta aplicacion? Sera eliminada del sistema");
        if (respuesta == true){
            return true;
        }
        else{
            return false;
        }
    }
</script>
<script type="text/javascript">
    function ConfirmAccept(){
        var respuesta = confirm ("Esta seguro que desea enviar este archivo?");
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
        <div class="">
            <div class="row">
                <div class="col">
                    <div class="tabla">

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Experiencia</th>
                                    <th scope="col">Jornada</th>
                                    <th scope="col">Sueldo</th>
                                    <th scope="col">Idioma Principal</th>
                                    <th scope="col">Idioma Secundario</th>
                                    <th scope="col">Enviar CV</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jobOfferList as $jobOffer){
                                    if ($jobOffer->getJobOfferId() == end($jobApplicationList)->getJobOfferId()){ ?>
                                <tr>
                                        <th scope="row"><a href="" class="nav-link text-dark"><?php echo $jobOfferDAO->MatchByCompanyId($jobOffer->getCompanyId()) ?></th>
                                        <td><?php echo $jobOffer->getJobPositionId() ?></td>
                                        <td><?php echo $jobOffer->getCareerId() ?></td>
                                        <td><?php echo $jobOffer->getExp() ?></td>
                                        <td><?php echo $jobOffer->getTurn() ?></td>
                                        <td><?php echo $jobOffer->getSalary() ?></td>
                                        <td><?php echo $jobOffer->getLang() ?></td>
                                        <td><?php echo $jobOffer->getPrefLang() ?></td> 

                                        <td>
                                            <form action ="<?php echo FRONT_ROOT."/Archivo/UploadPdf"
                                                                ?>" method="POST"  enctype="multipart/form-data">
                                               <input type="file" class="" name ="fichero">
                                              
                                               <input class="btn btn-light"  name="" type="submit" onclick="return ConfirmAccept()" value="Confirmar " >
                                            </form>              
                                           <form action ="<?php echo FRONT_ROOT . "/JobApplication/Delete " ?>" method="post">
                                            <input type="hidden" name="jobApplicationId" value="<?php echo end($jobApplicationList)->getJobApplicationId(); ?>">
                                              
                                            <input class="btn btn-light"  name="" type="submit" onclick="return ConfirmDelete()" value="Cancelar " >
                                            </form>
                                        </td>                                              
                                    <?php }}?>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
