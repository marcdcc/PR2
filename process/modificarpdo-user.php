<?php
ob_start();

try {
    include '../services/config.php';
    include '../services/conexion.php';
    include '../services/user.php';

    $nom_user=$_POST['nom_user'];
    $apellido_user=$_POST['apellido_user'];
    $email_user=$_POST['email_user'];
    $id_user=$_POST['id_user'];

    $moduser = $pdo->prepare("UPDATE tbl_users SET nom_user = ?, apellido_user = ?, email_user = ? where id_user= ?");

    $moduser->bindParam(1, $nom_user);
    $moduser->bindParam(2, $apellido_user);
    $moduser->bindParam(3, $email_user);
    $moduser->bindParam(4, $id_user);

    $moduser->execute();

    header('Location: ../view/zona_admin.php');
    ob_end_flush();
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

