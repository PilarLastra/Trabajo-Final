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
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/overides.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH ?>/busquedaOfertas.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>

<script type="text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm ("Esta seguro que desea eliminar esta propuesta? (El cambio sera permanente)");
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
                    <div class="caja-filtros">
                        <form action="<?php echo  FRONT_ROOT . "/JobOffer/SearchByParameters " ?>" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col">

                                        <select class="form-select" id="puesto" name="puesto" aria-label="Default select example">
                                            <option selected>Puesto</option>
                                            <?php foreach ($jobPositionList as $jobPosition) { ?>
                                                <option value="<?php echo $jobPosition->getDescription() ?>"><?php echo $jobPosition->getDescription() ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-select" id="carrera" name="carrera" aria-label="Default select example">
                                            <option selected>Carrera</option>
                                            <?php foreach ($careerList as $career) { ?>
                                                <option value="<?php echo $career->getDescription() ?>"><?php echo $career->getDescription() ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="submit" class="btn btn-outline-light" value="Buscar">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tabla">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Empresa</th>
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
                                    <th scope="col"></th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($jobOfferList as $jobOffer) {
                                ?>
                                    <tr>
                                        <td><?php echo $this->jobOfferDAO->MatchByCompanyId($jobOffer->getCompanyId() )?></td>
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

                                        if ($_SESSION['loggedUser']->getUserType() == "admin") { ?>
                                            <form action="<?php echo FRONT_ROOT . "/JobOffer/Remove" ?>" method="post">
                                                <td><input type="hidden" name="job_Offer_Id" id="job_Offer_Id" value="<?php echo $jobOffer->getJobOfferId(); ?>">
                                                <input class="btn btn-outline-light3"  name="" type="submit" onclick="return ConfirmDelete()" value="Eliminar " >
                                                </td>

                                            </form>

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
                </div>
                <div class="col" id="columna">
                    <h1 class="tituloColumna">Empresas vinculadas</h1>
                    <p class="linea"></p>
                    
                        <table class="table">

                            <tbody>
                                <?php foreach ($companyList as $company) {if($company->getActive() == "si"){ ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="text-light"><?php echo $company->getLegalName() ?></td>
                                        <form action="<?php echo FRONT_ROOT . "/Company/ShowCompanyProfile" ?>" method="post">
                                        <td>
                                            <input name="company_Id" type="hidden" value="<?php echo $company->getCompanyId() ?>" />
                                            <button class="btn btn-outline-light2" type="submit" name="">Ver</button>
                                        </td>
                                        </form>


                                    </tr>
                                <?php }
                                } ?>
                            </tbody>

                        </table>
                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>