<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Admin</title>
    <link rel="stylesheet" href="../css/salas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body">
<div class="fondo">
        <img src="../img/fondo-salas.gif" width="100%">
    </div>
    <div class="contenido">
        <div class="log">
            <a href='../process/logout.php' class='btn btn-secondary' style='padding-left: 60px;padding-right: 60px; background-color: black; border-color: white;'>Logout</a>
        </div>
        <div class="inicio">
            <div class="btn btn-secondary" style='padding-left: 60px;padding-right: 60px; background-color: black; border-color: white;'>
                <?php
                    include '../services/conexion.php';
                    session_start();
                    if(!empty($_SESSION['email'])){
                        echo "Hola ".$_SESSION['email'];
                        $nom=$_SESSION['email'];
                ?>
            </div>
        </div>
    <div>
        <?php
        echo "<h1>Personal del restaurante</h1>";
            
            try{
                $stmt = $pdo->prepare("SELECT * FROM tbl_users ORDER BY id_user ASC");
                $stmt->execute();
                $sentencia=$stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <table class="tbl_eventos">
                    <tr class="tbl_eventos">
                        <td>
                            <h4>ID</h4>
                        </td>    
                        <td>
                            <h4>Nombre</h4>
                        </td>
                        <td>
                            <h4>Apellido</h4>
                        </td>
                        <td>
                            <h4>Correo electrónico</h4>
                        </td>
                        <td>
                            <h4>Password</h4>
                        </td>
                        <td>
                            <h4>Puesto</h4>
                        </td>
                        <td>
                            <h4>Modificar</h4>
                        </td>
                        <td>
                            <h4>Eliminar</h4>
                        </td>
                    </tr>
                        <?php
                        foreach($sentencia as $row){ 
                        echo "<tr class='tbl_eventos'>";
                        echo "<td>{$row["id_user"]}</td>";
                        echo "<td>{$row["nom_user"]}</td>";
                        echo "<td>{$row["apellido_user"]}</td>";
                        echo "<td>{$row["email_user"]}</td>";
                        echo "<td>{$row["password_user"]}</td>";
                        echo "<td>{$row["rol_user"]}</td>";
                        echo "<td><a class='btn btn-warning' href='../process/modificarform-user.proc.php?id={$row['id_user']}'>Modificar</a></td>";
                        echo "<td><a class='btn btn-danger' href='../process/eliminar-user.proc.php?id={$row['id_user']}'>Eliminar</a></td>";
                        echo "</tr>";
                        }
                        ?>
                </table>
                    <?php
            }catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
    </div>
    <?php
        }else{
            header("location: ../view/login.php");
            ob_end_flush();
        }
        
        
    ?>
    </div>
</body>
</html>