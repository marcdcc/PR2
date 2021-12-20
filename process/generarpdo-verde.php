<?php
ob_start();
try {
    include '../services/config.php';
    include '../services/conexion.php';
    include '../services/reserva.php';

    $fecha_inicio=$_POST['fecha_inicio'];
    $hora_reserva =$_POST['hora_reserva'];
    $nombre_cliente=$_POST['nombre_cliente'];
    $id_mesa=$_POST['id_mesa'];

    $mesa1 = $pdo->prepare("UPDATE tbl_mesa SET tbl_mesa.reservada = 1 where id_mesa=?");
    $mesa1->bindParam(1, $id_mesa);
    $mesa1->execute();

    $comprobar_reserva = $pdo->prepare("SELECT * FROM tbl_reserva where fecha_inicio = '$fecha_inicio' and hora_reserva = '$hora_reserva' and id_mesa = '$id_mesa';");
    $comprobar_reserva->execute();
    $comprobar_reserva = $comprobar_reserva->rowCount();

    if($comprobar_reserva > 0){
        echo "<script>alert('Ya hay una reserva para este dia y esta hora'); window.location.href='../process/generarform-verde.php';</script>";
    }else{    
    
        //INSERTAR RESERVA
        $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha_inicio,hora_reserva,nombre_cliente,id_mesa,estado_reserva)
        VALUES (?, ?, ?, ?, 1)");
        
        $inicio_reserva->bindParam(1, $fecha_inicio);
        $inicio_reserva->bindParam(2, $hora_reserva);
        $inicio_reserva->bindParam(3, $nombre_cliente);   
        $inicio_reserva->bindParam(4, $id_mesa);    
        
        $inicio_reserva->execute();

        //UPDATE TABLA MESA RESERVADA=1
        $mesa1 = $pdo->prepare("UPDATE tbl_mesa SET reservada = 1 where id_mesa = ?");
        $mesa1->bindParam(1, $id_mesa);   
        $mesa1->execute();

        header('Location: ../view/vista-verde.php');
        ob_end_flush();
    }
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}

?>