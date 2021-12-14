<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/salas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="fondo">
        <img src="../img/fondo-salas.gif" width="100%">
    </div>
    <div class="contenido">
        <a href='../process/logout.php' class="btn btn-secondary">Logout</a>
        <div class="btn btn-secondary">
            <?php
                include '../services/conexion.php';
                session_start();
                if(!empty($_SESSION['nom_user'])){
                    echo "<b>Hola ".$_SESSION['nom_user']."</b>";
                    $nom=$_SESSION['nom_user'];
                }
            ?>
        </div>
        <form action='vista.php' method='post'>
            <a href="./vista-blanca.php?id=1"><img class="sala" src="../img/sala-blanca.jpg"></a>
            <a href="./vista-roja.php?id=2"><img class="sala" src="../img/sala-roja.png"></a>
            <a href="./vista-azul.php?id=3"><img class="sala" src="../img/sala-azul.jpg"></a>
            <a href="./vista-verde.php?id=4"><img class="sala" src="../img/sala-verde.jpg"></a>
        </form>
    </div>
</body>
</html>