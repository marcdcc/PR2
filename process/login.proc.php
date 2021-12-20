<?php 
ob_start();

if (isset($_POST['email']) && isset($_POST['password_user'])) {
    require_once '../services/conexion.php';
    $email=$_POST['email'];
    $password_user=$_POST['password_user'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE email_user='$email' and password_user='{$password_user}'");
    $stmt->execute();
    $comprobar=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $nom_user = $comprobar[0]['nom_user'];
    
    try {
        if (!$comprobar=="") {
            if($comprobar[0]['rol_user'] == 'Camarero'){
                session_start();
                $_SESSION['nom_user']=$nom_user;

                header("location: ../view/salas.php");
                ob_end_flush();
            }elseif($comprobar[0]['rol_user'] == 'Admin'){
                session_start();
                $_SESSION['email']=$nom_user;

                header("location: ../view/zona_admin.php");
                ob_end_flush();
            }else{
                //session_start();
                //$_SESSION['nom_user']=$nom_user;
                //Esto sería en el caso de que se creara una página para el jefe
                header("location: ../view/zona_admin.php");
                ob_end_flush();
            }
            
        }else {
            session_start();
            $_SESSION['error']=1;
            header("location: ../view/login.php");
            ob_end_flush();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.php");
    ob_end_flush();
}

?>