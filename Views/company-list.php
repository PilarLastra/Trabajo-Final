<?php
require_once("validate-session.php");

if ($_SESSION['loggedUser']->getUserType() == "admin") {
    require_once('nav.php');
} else {
    require_once('nav-student.php');
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
        <div class="search">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form action="<?php echo FRONT_ROOT . "/Company/SearchByName" ?>" method="post" class="d-flex">
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
                            <th scope="col"></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">CUIL</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Pagina Web</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Activo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($companyList as $company) {
                    ?>
                    <tr>
                    <th scope="row"></th>
                        <td><?php echo $company->getLegalName() ?></td>
                        <td><?php echo $company->getCUIL() ?></td>
                        <td><?php echo $company->getEmail() ?></td>
                        <td><?php echo $company->getContactNumber() ?></td>
                        <td><a href="https://<?php echo $company->getWeb();?>"><?php echo $company->getWeb() ?></a></td>
                        <td><?php echo $company->getAddress() ?></td>
                        <td><?php echo $company->getActive() ?></td>
                        <form action="<?php echo FRONT_ROOT . "/Company/ShowCompanyProfile"?>" method ="post">
                        <td> <input name ="company_Id" type="hidden" value="<?php echo $company->getCompanyId()?>"/>
                            <button class="btn btn-outline-light3" type="submit" name="">Ver</button>
                        </td>
                        </form>
                    <?php
                    
                    if ($_SESSION['loggedUser']->getUserType() == "admin") { ?>
                        
                                                            

                        <form action="<?php echo FRONT_ROOT . "/Company/Modify" ?>" method="post">
                            <td><input type="hidden" name="CUIL" id="CUIL" value="<?php echo $company->getCUIL();?>">
                            <button class="btn btn-outline-light3" type="submit" name="">Modificar</button></td>

                    </form>
                    <?php }}?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
