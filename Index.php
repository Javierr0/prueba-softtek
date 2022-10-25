<?php
include "controlador/controladorLogin.php"
?>

<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row main-content text-center">
            <div class="col-md-6 text-end">
                <img src="assets/img/softtek-logo.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12  text-start ">
                <main class="form-signin m-auto">
                    <h1 class="text-center">Ingreso de usuarios</h1>
                    <form action=" " method="post">
                        <div class="form-floating mt-2">
                            <input type="number" name="Txtcedula" class="form-control" id="floatingInput" placeholder="123456789" value="<?= $_POST["Txtcedula"] ?? '' ?>" required>
                            <label for="floatingInput">Cedula usuario</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="password" name="Txtpassword" class="form-control" id="floatingInput" placeholder="1234" value="<?= $_POST["Txtpassword"] ?? '' ?>" required>
                            <label for="floatingInput">Contraseña</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="Btningresar" value="Ok">Ingresar</button>
                        <a class="btn btn-danger" href="Registrar_usuario.php" role="button">¿No tienes una cuenta?</a>
                        <div class="mt-5">
                            <a class="btn btn-success" href="publico_usuarios.php" role="button">Consulta Usuarios</a>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

</body>

</html>