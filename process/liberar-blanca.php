<?php 
ob_start();

include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$id_reserva = $_GET['id'];

$fecha_actual=date("Y-m-d");


try {

    $fin_reserva = $pdo->prepare("UPDATE tbl_reserva
    SET tbl_reserva.hora_reserva = ?
    where id_reserva = ?");
    
    $fin_reserva->bindParam(1, $fecha_actual);
    $fin_reserva->bindParam(2, $id_reserva);    
    
    $fin_reserva->execute();



    $mesa0 = $pdo->prepare("UPDATE tbl_mesa
	inner join tbl_reserva on tbl_mesa.id_mesa=tbl_reserva.id_mesa
    SET tbl_mesa.reservada = 0
    where tbl_reserva.id_reserva=?");
   
    $mesa0->bindParam(1, $id_reserva);
   
    $mesa0->execute();


    $reserva0 = $pdo->prepare("UPDATE tbl_reserva
    SET tbl_reserva.estado_reserva = 0
    where tbl_reserva.id_reserva=?");
   
    $reserva0->bindParam(1, $id_reserva);
   
    $reserva0->execute();

    //Fetch your records and display.

    header('Location: ../view/vista-blanca.php');
    ob_end_flush();
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}
