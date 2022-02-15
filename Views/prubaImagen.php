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


                <form action="<?php echo FRONT_ROOT . "/imagen/upload" ?>" method="post" enctype="multipart/form-data">
                    <div id="registro">

                        <div class="form-group">
                            <label for="my-input">Seleccione una Imagen</label>
                            <input id="my-input" type="file" name="imagen">
                        </div>



                    </div>

                </form>




            </div>
        </div>
    </main>
</body>

</html>