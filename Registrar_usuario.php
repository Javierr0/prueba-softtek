<?php

include "controlador\controladorRegistro.php"

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/029210e931.js" crossorigin="anonymous"></script>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <h1 class="text-center "> Crear cuenta</h1>
        <form action=" " method="post">
            <!-- CC input -->

            <div class="form-floating mt-2">
                <input type="number" name="Txtcedula" class="form-control" id="floatingInput" placeholder="123456789" required>
                <label for="floatingInput">Cedula Persona</label>
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="Txtnombre" class="form-control" id="floatingInput" placeholder="Pepito" required>
                <label for="floatingInput">Nombre</label>
            </div>

            <div class="form-floating mt-2">
                <input type="text" name="Txtapellido" class="form-control" id="floatingInput" placeholder="123456789" required>
                <label for="floatingInput">Apellido</label>
            </div>

            <div class="form-floating mt-2">
                <input type="password" name="Txtpass" class="form-control" id="floatingInput" placeholder="1234" required>
                <label for="floatingInput">Contraseña</label>
            </div>

            <button type="submit" class="btn btn-primary" name="BtnRegistro" value="Ok">Registrar nuevo</button>
            <a class="btn btn-success" href="index.php" role="button">Ya tengo Cuenta</a>
        </form>
    </main>
</body>

</html>