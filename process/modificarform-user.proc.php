<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/salas.css">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
<div class="fondo">
        <img src="../img/fondo-salas.gif" width="100%">
</div>
<div class="contenido">
        <div class="log">
            <a href='../process/logout.php' class='btn btn-secondary' style='padding-left: 60px;padding-right: 60px; background-color: black; border-color: white;'>Logout</a>
        </div>
        <div class="inicio">
                <a href='../view/zona_admin.php' class='btn btn-dark' style='padding-left: 60px;padding-right: 60px; background-color: black; border-color: white'>Back</a>
        </div>
        <?php
        include '../services/conexion.php';
        include '../services/user.php';

        $id = $_GET['id'];
        $qry = $pdo->prepare("SELECT * FROM tbl_users where id_user = ?");
        $qry->bindParam(1, $id);
        $qry->execute();
        $user=$qry->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="modificarpdo-user.php" method="post" class="caja" onsubmit="return validar()">
                <h2 class="titulo">Modificar Usuario</h2>
                <p><br></p>
                <div class=alert id='mensaje'></div>
                <p>Nombre</p>
                <input name="nom_user" type="text" id="nom_user">
                <br>
                <p>Apellido</p>
                <input name="apellido_user" type="text" id="apellido_user">
                <br>
                <p>Email</p>
                <input name="email_user" type="text" id="email_user">
                <br>
                <input type="hidden" name="id_user" value="<?php echo $_GET['id'] ?>">
                <br>
                <input type="submit" value="Modificar usuario" class="btn btn-dark">
        </form>
</div>
</body>
</html>