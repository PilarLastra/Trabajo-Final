<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/AgregarEmpresaTrabajo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/overides.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URLdin</title>
</head>
<body style="background-color:#7B68EE">
<main>
        <div class="container">
            <div id="cuadrado">
           
                <!–– select imagen ––>
                    <ul class="nav justify-content-center">
                    <form action="<?php echo  FRONT_ROOT . "/Session/Register"?>" method="post" >
                        <li class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                            <label for="email">Email</label>
                        </li>
                        <li class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="123456">
                            <label for="password">Password</label>
                        </li>
                        <input type="submit" class="btn btn-outline-light" value="Registrarse">
                      
                        </form>
                        <form action="<?php echo FRONT_ROOT . "/Home/Index"?>" >
                             <input type="submit" class="btn btn-outline-light" value="Volver">
                        </form>
                    </ul>
                              
                           
                        </div>
                        
                        </div class="alert alert-<?php echo $alert->getType()?>">
                    <?php echo $alert->getMessage();?>
                    <div>
            </div>
        </div>
    </main>
</body>
</html>