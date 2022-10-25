<?php

//Traer controlador de Login
include "controlador/controladorUsuario.php";


// Mostrar nombre de usuarios
$nombre = $_SESSION["Nombre"] . " " . $_SESSION["Apellido"];

$roles_name = [];
foreach ($roles as $key => $value) {
    $roles_name[$value["id"]] = $value["rol"];
}

?>


<!DOCTYPE html>
<html lang="en">

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

<body>
    <div class="container m-6">
        <p class="h1">Hola: <b><?= $nombre ?></b></p>
        <p class="h3">Rol: <b><?= $roles_name[$_SESSION["Rol"]] ?></b></p>
        <div class="text-center">
            <a class="btn btn-danger" href="controlador/Controlador_cerrar_session.php" role="button">cerrar session</a>
        </div>

        <div class="row">
            <div class="col-md-12 m-2">
                <?php if ($is_admin) : ?>
                    <form action="">
                        <input type="hidden" name="action" value="registrar">
                        <button type="submit" class="btn btn-primary">Nuevo usuario</button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-8">
                <div class="d-flex overflow-hidden">
                    <table id="data-table" class="table table-fixed table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Fecha ingreso</th>
                                <?= ($is_admin)  ? '<th scope="col">Acción</th>' : ''; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ConexionBBD->query("SELECT * FROM usuarios  JOIN roles ON roles.id = usuarios.id_rol ") as $row) : ?>
                                <tr>
                                    <td scope="row"><?php echo $row["id_usuario"] ?></td>
                                    <td scope="row"><?php echo $row["cedula"] ?></td>
                                    <td scope="row"><?php echo $row["nombre_usuario"] ?></td>
                                    <td scope="row"><?php echo $row["apellido_usuario"] ?></td>
                                    <td scope="row"><?php echo $row["rol"] ?></td>
                                    <td scope="row"><?php echo $row["fecha_ingreso"] ?></td>
                                    <?php if ($is_admin) : ?>
                                        <td scope="row">
                                            <div class="row">
                                                <div class="col-3 m-1">
                                                    <form action="">
                                                        <input type="hidden" name="action" value="editar">
                                                        <input type="hidden" name="id" value="<?= $row["id_usuario"] ?>">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-3 m-1">
                                                    <form action="">
                                                        <input type="hidden" name="action" value="eliminar">
                                                        <input type="hidden" name="id" value="<?= $row["id_usuario"] ?>">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php if (!empty($_REQUEST['action']) && $_REQUEST['action'] === 'editar') : ?>
                <div class="col-4">
                    <h3>Editar Usuario</h3>
                    <form method="post">
                        <input type="hidden" name="Txtid" value="<?= $usuarioData['Id'] ?>" required>
                        <div class="form-floating mt-2">
                            <input type="number" name="Txtcedula" class="form-control" id="floatingInput" value="<?= $usuarioData['Cedula'] ?? '' ?>" required>
                            <label for="floatingInput">Cedula Persona</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="Txtnombre" class="form-control" id="floatingInput" placeholder="Pepito" value="<?= $usuarioData['Nombre'] ?? '' ?>" required>
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="Txtapellido" class="form-control" id="floatingInput" placeholder="123456789" value="<?= $usuarioData['Apellido'] ?? '' ?>" required>
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="password" name="Txtpass" class="form-control" id="floatingInput" placeholder="1234" value="">
                            <label for="floatingInput">Contraseña</label>
                        </div>

                        <div class="form-floating mt-2">
                            <select class="form-select" aria-label="Default select example" name="Txtrol">
                                <option selected>Selecione ROL</option>
                                <?php foreach ($roles as $rol) : ?>
                                    <option value="<?= $rol['id'] ?>"><?= $rol['rol'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-floating mt-2">
                            <button type="submit" class="btn btn-primary" name="Btnactualizar" value="Ok">Actualizar</button>
                        </div>
                    </form>

                </div>
            <?php endif; ?>
            <?php if (!empty($_REQUEST['action']) && $_REQUEST['action'] === 'registrar') : ?>
                <div class="col-4">
                    <h3>Registro Usuario</h3>
                    <form method="post">
                        <input type="hidden" name="Txtid" value="<?= $usuarioData['Id'] ?>" required>
                        <div class="form-floating mt-2">
                            <input type="number" name="Txtcedula" class="form-control" id="floatingInput" value="<?= $_POST["Txtcedula"] ?? '' ?>" required>
                            <label for="floatingInput">Cedula Persona</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="Txtnombre" class="form-control" id="floatingInput" placeholder="Pepito" value="<?= $_POST["Txtnombre"] ?? '' ?>" required>
                            <label for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="Txtapellido" class="form-control" id="floatingInput" placeholder="123456789" value="<?= $_POST["Txtapellido"] ?? '' ?>" required>
                            <label for="floatingInput">Apellido</label>
                        </div>

                        <div class="form-floating mt-2">
                            <input type="password" name="Txtpass" class="form-control" id="floatingInput" placeholder="1234" value="" required>
                            <label for="floatingInput">Contraseña</label>
                        </div>

                        <div class="form-floating mt-2">
                            <select class="form-select" aria-label="Default select example" name="Txtrol" required>
                                <option value="0">Selecione ROL</option>
                                <?php foreach ($roles as $rol) : ?>
                                    <option value="<?= $rol['id'] ?>"><?= $rol['rol'] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-floating mt-2">
                            <button type="submit" class="btn btn-primary" name="Btnregistrar" value="Ok">Registrar</button>

                        </div>
                    </form>

                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>