<?php
include "modelo/ConexionBd.php";

$ConexionBBD = new ConexionBd();

if (!empty($_POST["BtnRegistro"])) {
    if (!empty($_POST["Txtcedula"]) || !empty($_POST["Txtnombre"]) || !empty($_POST["Txtapellido"]) || !empty($_POST["Txtpass"])) {

        $cedula = htmlspecialchars($_POST["Txtcedula"]);
        $nombre = htmlspecialchars($_POST["Txtnombre"]);
        $apellido = htmlspecialchars($_POST["Txtapellido"]);
        $password = md5(htmlspecialchars($_POST["Txtpass"]));

        $sql = "CALL prueba_softtek.crearUsuario($cedula,'$nombre','$apellido','2','$password');";
        $resultado = $ConexionBBD->query($sql);
        if ($resultado) {
            echo '<script>
                    alert("Usuario creado correctamente")
                    location.href ="index.php";
                  </script> 
            ';
            
        } else {
            echo '<script>
                    alert("El usuario ya se encuentra registrado")
                  </script>';
        }
    } else {
        echo '<script>alert("Ingresa los datos")</script>';
    }

}
