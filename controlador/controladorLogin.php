<?php
session_start();

if (!empty($_SESSION)) {
    header("location: Inicio.php");
}


include "modelo/ConexionBd.php";
$ConexionBBD = new ConexionBd();

if (!empty($_POST["Btningresar"])) {
    if (!empty($_POST["Txtcedula"]) and !empty($_POST["Txtpassword"])) {
        $usuario = htmlspecialchars($_POST["Txtcedula"]);
        $pass = md5(htmlspecialchars($_POST["Txtpassword"]));

        $sql = "SELECT * FROM usuarios WHERE cedula='$usuario' and password ='$pass'";

        $respuesta = $ConexionBBD->query($sql);

        if ($datos = $respuesta->fetch_object()) {
            $_SESSION["Id"] = $datos->id_usuario;
            $_SESSION["Nombre"] = $datos->nombre_usuario;
            $_SESSION["Apellido"] = $datos->apellido_usuario;
            $_SESSION["Rol"] = $datos->id_rol;

            header("location: Inicio.php");
        } else {
            echo '<script>alert("Nombre o contraseña incorrecta ")</script>';
        }
    } else {
        echo '<script>alert("Ingresa los datos")</script>';
    }
}
