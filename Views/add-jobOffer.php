<?php

if ($_SESSION["loggedUser"]->getUserType() == "admin") {

    include("nav.php");
} elseif ($_SESSION["loggedUser"]->getUserType() == "company") {
    include("nav-company.php");
} else {
    echo "<script> if(confirm('Acceso incorrecto'));";
    echo "window.location = '../index.php';
</script>";
}

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
        <div class="container">
            <div id="cuadrado">

                <form action="<?php echo  FRONT_ROOT . "/JobOffer/Add " ?>" method="post">

                    <div>
                        <h1>Nueva Oferta de Trabajo</h1>
                        <h2 id="linea"></h2>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <?php if ($_SESSION['loggedUser']->getUserType() == "admin") { ?>
                                    <select class="form-select" id="company_Id" name="company_Id" aria-label="Default select example">

                                        <option selected>Empresa</option>
                                        <?php foreach ($companyList as $company) {
                                            if ($company->getActive() == 'si') { ?>
                                                <option value="<?php echo $company->getLegalName() ?>"><?php echo $company->getLegalName() ?></option>
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                <?php } else { ?> <input type="hidden" name="company_Id" value="<?php echo $_SESSION['loggedUser']->getLegalName() ?>">
                                <?php } ?>
                                </select>
                                <select class="form-select" id="career_Id" name="career_Id" aria-label="Default select example">
                                    <option selected>Carrera</option>
                                    <?php foreach ($careerList as $career) { ?>
                                        <option value="<?php echo $career->getDescription() ?>"><?php echo $career->getDescription() ?></option>
                                    <?php } ?>
                                </select>

                                <select class="form-select" id="puesto" name="puesto" aria-label="Default select example">
                                    <option selected>Puesto</option>
                                    <?php foreach ($jobPositionList as $jobPosition) { ?>
                                        <option value="<?php echo $jobPosition->getDescription() ?>"><?php echo $jobPosition->getDescription() ?></option>
                                    <?php } ?>
                                </select>

                                <select class="form-select" id="exp" name="exp" aria-label="Default select example">
                                    <option selected>Experiencia</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>

                                <select class="form-select" id="turn" name="turn" aria-label="Default select example">
                                    <option selected>Turno</option>
                                    <option value="mañana">Mañana</option>
                                    <option value="tarde">Tarde</option>
                                    <option value="noche">Noche</option>
                                </select>


                            </div>
                            <div class="col">
                                <select class="form-select" id="salary" name="salary" aria-label="Default select example">
                                    <option selected>Sueldo</option>
                                    <option value="40.000 - 60.000">40.000 - 60.000</option>
                                    <option value="60.000 - 100.000">60.000 - 100.000</option>
                                    <option value="100.000 - ...">100.000 - ... </option>
                                    <option value="A hablar en la entrevista">A hablar en la entrevista </option>
                                </select>

                                <select class="form-select" id="lang" name="lang" aria-label="Default select example">
                                    <option selected>Idioma Principal</option>
                                    <option value="Español">Español</option>
                                    <option value="Ingles">Ingles</option>
                                    <option value="Aleman">Aleman</option>
                                    <option value="Frances">Frances</option>
                                </select>

                                <select class="form-select" id="langP" name="langP" aria-label="Default select example">
                                    <option selected>Idioma Secundario</option>
                                    <option value="Español">Español</option>
                                    <option value="Ingles">Ingles</option>
                                    <option value="Aleman">Aleman</option>
                                    <option value="Frances">Frances</option>
                                </select>
                                <select class="form-select" id="place" name="place" aria-label="Default select example">
                                    <option selected>Trabajo</option>
                                    <option value="Remoto">Remoto</option>
                                    <option value="Distancia">Distancia</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-floating" id="registro">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description"></textarea>
                        <label for="floatingTextarea">Comments</label>

                        <div class="col-4">  
                    <div class="modal fade" id="add" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="add"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Esta seguro que desea agregar esta oferta?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal">Si</button>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="add" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="add"></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Oferta añadida con exito.
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="btn btn-outline-light" data-bs-toggle="modal" type="submit" href="#add" role="button">Agregar</a>
             
                    </div>

                    </div>

                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
