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
        <div class="log">
            <a href='../process/logout.php' class='btn btn-secondary' style='padding-left: 60px;padding-right: 60px; border-color: white;'>Logout</a>
        </div>
        <div class="inicio">
            <div class="btn btn-secondary" style='padding-left: 60px;padding-right: 60px; border-color: white;'>
                <?php
                    include '../services/conexion.php';
                    session_start();
                    if(!empty($_SESSION['nom_user'])){
                        echo "Hola ".$_SESSION['nom_user'];
                        $nom=$_SESSION['nom_user'];
                    }
                ?>
            </div>
        </div>
    <br><br><br>
        <a href="./vista-blanca.php?id=1">
            <div class="blanca" >
                <img class="sala" src="../img/sala-blanca.jpg">
                <p class='white' style="border-color: white;">SALA BLANCA</p>
            </div>
        </a>
        <a href="./vista-roja.php?id=2">
            <div class="roja">
                <img class="sala" src="../img/sala-roja.png">
                <p class='red' style="border-color: white;">SALA ROJA</p>
            </div>
        </a>
        <a href="./vista-azul.php?id=3">
            <div class="azul">
                <img class="sala" src="../img/sala-azul.jpg">
                <p class='blue' style="border-color: white;">SALA AZUL</p>
            </div>
        </a>
        <a href="./vista-verde.php?id=4">
            <div class="verde">
                <img class="sala" src="../img/sala-verde.jpg">
                <p class='green' style="border-color: white;">SALA VERDE</p>
            </div>
        </a>
    </div>
</body>
</html>