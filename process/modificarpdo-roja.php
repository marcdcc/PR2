<?php

try {
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$fecha_inicio=$_POST['fecha_inicio'];
$hora_reserva=$_POST['hora_reserva'];
$nombre_cliente=$_POST['nombre_cliente'];
$id_reserva=$_POST['id_reserva'];

    $modreserva = $pdo->prepare("UPDATE tbl_reserva
    SET fecha_inicio = ?, hora_reserva = ?, nombre_cliente = ?
    where id_reserva= ?");
   
    $modreserva->bindParam(1, $fecha_inicio);
    $modreserva->bindParam(2, $hora_reserva);
    $modreserva->bindParam(3, $nombre_cliente);
    $modreserva->bindParam(4, $id_reserva);
   
    $modreserva->execute();

    header('Location: ../view/vista-roja.php');
    
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}