<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Filtro</title>
</head>
<body>
    <form method="POST">
        Ubicación:<br>
        <select name="Terraza"><br>
            <option>Comedor</option>
            <option>Terraza</option>
        </select><br><br>
        Mesa:<br>
        <input type="text" name="mesa"><br><br>
        <input type="submit" value="Filtrar">
    </form>
<?php
include '../services/config.php';
include '../services/conexion.php';

    $sql = "SELECT tbl_mesa.id_mesa as 'Número de mesa', tbl_reserva.num_personas as 'Número de personas', tbl_reserva.fecha_inicio as 'Hora de la reserva', tbl_reserva.fecha_final as 'Hora final reserva' from tbl_reserva 
    INNER JOIN tbl_mesa ON tbl_mesa.id_mesa = tbl_reserva.id_mesa
    INNER JOIN tbl_ubicacion ON tbl_ubicacion.id_ubi = tbl_mesa.id_ubi
    WHERE tbl_ubicacion.tipo_ubi='Terraza'";
    $result = mysqli_query($conn,$sql);

    foreach($result as $terraza){
        echo '<tr>';
        echo '<td>'.$terraza['Número de mesa'].'</td>';
        echo '<td>'.$terraza['Número de personas'].'</td>';
        echo '<td>'.$terraza['Hora de la reserva'].'</td>';
        echo '<td>'.$terraza['Hora final reserva'].'</td>';
        echo '</tr>';
    }

   /* $sql2 = "SELECT tbl_mesa.id_mesa as 'Número de mesa', tbl_reserva.num_personas as 'Número de personas', tbl_reserva.fecha_inicio as 'Hora de la reserva' from tbl_reserva 
    INNER JOIN tbl_mesa ON tbl_mesa.id_mesa = tbl_reserva.id_mesa
    INNER JOIN tbl_ubicacion ON tbl_ubicacion.id_ubi = tbl_mesa.id_ubi
    WHERE tbl_ubicacion.tipo_ubi='Comedor'";
    $result2 = mysqli_query($conn,$sql2);

    foreach($result2 as $comedor){
        echo '<tr>';
        echo '<td>'.$comedor['Número de mesa'].'</td>';
        echo '<td>'.$comedor['Número de personas'].'</td>';
        echo '<td>'.$comedor['Hora de la reserva'].'</td>';
        echo '<td>'.$comedor['Hora final reserva'].'</td>';
        echo '</tr>';
    }*/
?>
</body>
</html>