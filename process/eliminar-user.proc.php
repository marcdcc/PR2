<?php 
ob_start();

include '../services/conexion.php';
include '../services/config.php';
include '../services/user.php';

$id_user = $_GET['id'];

try {
    
    $stmt = $pdo->prepare("DELETE FROM tbl_users WHERE id_user = ?");
    $stmt->bindParam(1, $id_user);
    $stmt->execute();

    if($stmt->execute()){
        header("location: ../view/zona_admin.php");
        ob_end_flush();
    }else{ 
        header("location: ../view/zona_admin.php?error=errorelim");
        ob_end_flush();
    }
}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

