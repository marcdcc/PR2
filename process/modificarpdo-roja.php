<?php
ob_start();

try {
    include '../services/config.php';
    include '../services/conexion.php';
    include '../services/reserva.php';

    $fecha_inicio=$_POST['fecha_inicio'];
    $hora_reserva=$_POST['hora_reserva'];
    $nombre_cliente=$_POST['nombre_cliente'];
    $id_reserva=$_POST['id_reserva'];

    $comprobar_reserva = $pdo->prepare("SELECT * FROM tbl_reserva where fecha_inicio = '$fecha_inicio' and hora_reserva = '$hora_reserva'");
    $comprobar_reserva->execute();
    $comprobar_reserva = $comprobar_reserva->rowCount();

    if($comprobar_reserva > 0){
        echo "<script>alert('Ya hay una reserva para este dia y esta hora'); window.location.href='../view/vista-roja.php';</script>";
    }else{
        $modreserva = $pdo->prepare("UPDATE tbl_reserva SET fecha_inicio = ?, hora_reserva = ?, nombre_cliente = ? where id_reserva= ?");

        $modreserva->bindParam(1, $fecha_inicio);
        $modreserva->bindParam(2, $hora_reserva);
        $modreserva->bindParam(3, $nombre_cliente);
        $modreserva->bindParam(4, $id_reserva);
        
        $modreserva->execute();

        header('Location: ../view/reservas-roja.php');
        ob_end_flush();
    }
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

