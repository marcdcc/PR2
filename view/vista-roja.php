<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vista-roja.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
</body>
</html>

<?php
include '../services/config.php';
include '../services/conexion.php';

echo "<div class='log'>";
echo "<a href='../process/logout.php' class='btn btn-light' style='padding-left: 60px;padding-right: 60px; border-color: black' color: black;>Logout</a>";
echo "</div>";
echo "<div class='inicio'>";
echo "<a href='../view/salas.php' class='btn btn-danger' style='padding-left: 60px;padding-right: 60px; border-color: white; background-color: #7e2029;'>Home</a>";
echo "</div>";
echo "<br><br>";
echo "<h1>Mesas de la Sala Roja</h1>";




$sentencia = $pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.reservada, tbl_mesa.num_silla_dispo, tbl_ubicacion.tipo_ubi, tbl_mesa.id_ubi
    from tbl_mesa
    left outer join tbl_reserva on tbl_mesa.id_mesa=tbl_reserva.id_mesa 
    left outer join tbl_ubicacion on tbl_ubicacion.id_ubi=tbl_mesa.id_ubi
    where tbl_mesa.id_ubi=2
    group by tbl_mesa.id_mesa
    order by id_mesa");
    $sentencia->bindParam(1, $ubicacion);
    $sentencia->execute();
    $listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaMesas as $mesa) {    
    include 'vistacomun.php';

    echo "<tr>";
    echo "<td><a type='button' class='btn btn-outline-dark' href='../process/generarform-roja.php?id={$mesa['id_mesa']}&nsillas={$mesa['num_silla_dispo']}'>Generar reserva</a></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
    echo "</tr>";
    echo "</table>";
}

?>

<div class="btn_reservas">
    <a href="../view/reservas-roja.php" type="button" class='btn btn-danger' style='padding-left: 100px;padding-right: 100px; border-color: white; background-color: #7e2029; font-size: 20px;'>Ver Reservas</a>
</div>
</body>
</html>