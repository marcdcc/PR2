<?php

try {
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$fecha_inicio=$_POST['fecha_inicio'];
$hora_reserva =$_POST['hora_reserva'];
$nombre_cliente=$_POST['nombre_cliente'];
$id_mesa=$_POST['id_mesa'];

    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET tbl_mesa.reservada = 1
    where id_mesa=?");
   
    $mesa1->bindParam(1, $id_mesa);
   
    $mesa1->execute();
/*
    $reserva1 = $pdo->prepare("UPDATE tbl_reserva
    SET tbl_reserva.estado_reserva = 1
    where id_reserva=?");
   
    $reserva1->bindParam(1, $id_reserva);
   
    $reserva1->execute();

    */
    
    
    //INSERTAR RESERVA
    $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha_inicio,hora_reserva,nombre_cliente,id_mesa,estado_reserva)
    VALUES (?, ?, ?, ?, 1)");
    
    $inicio_reserva->bindParam(1, $fecha_inicio);
    $inicio_reserva->bindParam(2, $hora_reserva);
    $inicio_reserva->bindParam(3, $nombre_cliente);   
    $inicio_reserva->bindParam(4, $id_mesa);   
    
    $inicio_reserva->execute();


    //UPDATE TABLA MESA RESERVADA=1
    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET reservada = 1
    where id_mesa = ?");
    
    $mesa1->bindParam(1, $id_mesa);   
    
    $mesa1->execute();
/*
    $reserva1 = $pdo->prepare("UPDATE tbl_reserva
    SET estado_reserva = 1
    where id_reserva = ?");
    
    $reserva1->bindParam(1, $estado_reserva);   
    
    $reserva1->execute();
*/
    header('Location: ../view/vista-blanca.php');
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}

?>