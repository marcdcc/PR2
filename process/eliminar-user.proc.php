<?php 
ob_start();

try {
    include '../services/conexion.php';
    include '../services/config.php';
    include '../services/user.php';

    $id = $_GET['id'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("DELETE FROM tbl_users WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();

    if($stmt->execute()){
        header("location: ../view/zona_admin.php");
        ob_end_flush();
    }else{ 
        header("location: ../view/zona_admin.php?error=errorelim");
        ob_end_flush();
    }

    $pdo->commit();
}catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error : " . $e->getMessage();
}

