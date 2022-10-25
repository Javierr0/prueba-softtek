<?php
include "modelo/ConexionBd.php";

$ConexionBBD = new ConexionBd();
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

  <div class="container">
    <h1>Usuarios</h1>
    <h2></h2>
    <a class="btn btn-primary" href="Index.php" role="button">Ingresar</a>
    <a class="btn btn-danger" href="Registrar_usuario.php" role="button">Aun no tengo cuenta</a>
    <div class="row">
      <div class="col-md-12">
        <table class="table  table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Fecha ingreso</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ConexionBBD->query("SELECT * FROM usuarios ") as $row) : ?>
              <tr>
                <td scope="row"><?php echo $row["id_usuario"] ?></td>
                <td scope="row"><?php echo $row["nombre_usuario"] ?></td>
                <td scope="row"><?php echo $row["apellido_usuario"] ?></td>
                <td scope="row"><?php echo $row["fecha_ingreso"] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>