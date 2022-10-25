<?php
session_start();
if (empty($_SESSION["Id"])) {
    header("Location: index.php");
}

include "modelo/ConexionBd.php";

$ConexionBBD = new ConexionBd();


$roles = [];
$respuesta = $ConexionBBD->query("SELECT * FROM roles");

while ($datos = $respuesta->fetch_assoc()) {
    $roles[] = $datos;
}

$is_admin = ($_SESSION["Rol"] === '1') ? true : false;

$usuarioData = $usuarioData ?? null;

// Eliminar //
if ($is_admin) {
    if (!empty($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'eliminar') {
            $id = $_REQUEST['id'];
            $ConexionBBD->query("DELETE FROM usuarios WHERE id_usuario = $id");
            header("Location: Inicio.php");
        }
        if ($_REQUEST['action'] == 'editar') {
            $id = $_REQUEST['id'];
            $respuesta = $ConexionBBD->query("SELECT * FROM usuarios WHERE id_usuario = $id");

            $usuarioData = [];
            if ($datos = $respuesta->fetch_object()) {
                $usuarioData["Id"] = $datos->id_usuario;
                $usuarioData["Cedula"] = $datos->cedula;
                $usuarioData["Nombre"] = $datos->nombre_usuario;
                $usuarioData["Apellido"] = $datos->apellido_usuario;
                $usuarioData["Rol"] = $datos->id_rol;
            }
        }
    }

    if (!empty($_POST["Btnactualizar"])) {
        if (!empty($_POST["Txtcedula"]) || !empty($_POST["Txtnombre"]) || !empty($_POST["Txtapellido"])) {
            $id = $_POST["Txtid"];
            $cedula = htmlspecialchars($_POST["Txtcedula"]);
            $nombre = htmlspecialchars($_POST["Txtnombre"]);
            $apellido = htmlspecialchars($_POST["Txtapellido"]);
            $rol = htmlspecialchars($_POST["Txtrol"]);
            $pass_sql = '';

            if (!empty($_POST["Txtpass"])) {
                $pass = md5(htmlspecialchars($_POST["Txtpass"]));
                $pass_sql = ", password = '$pass'";
            }

            $sql = "UPDATE usuarios SET cedula='$cedula', nombre_usuario='$nombre', apellido_usuario='$apellido', id_rol='$rol' $pass_sql WHERE id_usuario = $id";

            $respuesta = $ConexionBBD->query($sql);

            echo '<script>
                    alert("usuario Actualizado")
                     location.href ="Inicio.php";
               </script>';
        }
    }

    if (!empty($_POST["Btnregistrar"])) {
        if (!empty($_POST["Txtcedula"]) && !empty($_POST["Txtnombre"]) && !empty($_POST["Txtapellido"]) && !empty($_POST["Txtpass"]) && !empty($_POST["Txtrol"])) {
            $cedula = $_POST['Txtcedula'];
            $nombre = $_POST['Txtnombre'];
            $apellido = $_POST['Txtapellido'];
            $rol = $_POST['Txtrol'] ?? 2;
            $password = md5($_POST['Txtpass']);

            $sql = "CALL prueba_softtek.crearUsuario($cedula,'$nombre','$apellido',$rol,'$password');";
            $respuesta = $ConexionBBD->query($sql);

            if ($respuesta) {
                echo '<script>
                    alert("usuario Creado")
                     location.href ="Inicio.php";
               </script>';
            } else {
                echo '<script>
                    alert("El usuario ya existe")
               </script>';
            }
        }
    }
    
}
