<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vista-verde.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php
        include '../services/config.php';
        include '../services/conexion.php';

        echo "<div class='log'>";
        echo "<a href='../process/logout.php' class='btn btn-light' style='padding-left: 60px;padding-right: 60px; border-color: black' color: black;>Logout</a>";
        echo "</div>";
        echo "<div class='inicio'>";
        echo "<a href='../view/vista-verde.php' class='btn btn-dark' style='padding-left: 60px; padding-right: 60px; border-color: white; background-color: #146025;'>Back</a>";
        echo "</div>";
        echo "<h1>Reservas de la Sala Verde</h1>";

        echo "<form class='caja' method='post'>";
            echo "<div>";
            echo "<input type='number' class='btn btn-dark' name='id_mesa' id='id_mesa' min='1' max='8' placeholder='Mesa'> ";
            echo "<input type='date' class='btn btn-dark' name='fecha_inicio' id='fecha_inicio'> ";
            echo "<input type='time' class='btn btn-dark' name='hora_reserva' id='hora_reserva'> ";
            echo "<input  type='submit' class='btn btn-light' name='enviar' value='FILTRAR'>";
            echo "</div>";
        echo "</form>";
    ?>
    <table class="tbl_eventos">
        <tr class="tbl_eventos">
            <td>
                <h4>Nº reserva</h4>
            </td>    
            <td>
                <h4>Mesa</h4>
            </td>
            <td>
                <h4>Dia de la reserva</h4>
            </td>
            <td>
                <h4>Hora de la reserva</h4>
            </td>
            <td>
                <h4>Nombre de la reserva</h4>
            </td>
            <td>
                <h4>Modificar</h4>
            </td>
            <td>
                <h4>Eliminar</h4>
            </td>
        </tr>
        <?php
        if(!isset($_POST['enviar'])){
            $stmt = $pdo->prepare('SELECT * FROM tbl_reserva where estado_reserva = 1 and id_mesa >= 25 and id_mesa <= 32 and fecha_inicio >= CURDATE() and  hora_reserva <> CURTIME() ORDER BY id_reserva DESC');
            $stmt->execute();
            $sentencia=$stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($sentencia as $row){
                echo "<tr class='tbl_eventos'>";
                    echo "<td>{$row["id_reserva"]}</td>";
                    echo "<td>{$row["id_mesa"]}</td>";
                    echo "<td>{$row["fecha_inicio"]}</td>";
                    echo "<td>{$row["hora_reserva"]}</td>";
                    echo "<td>{$row["nombre_cliente"]}</td>";
                    echo "<td><a class='btn btn-warning' href='../process/modificarform-verde.php?id={$row['id_reserva']}'>Modificar</a></td>";
                    echo "<td><a class='btn btn-danger' href='../process/liberar-verde.php?id={$row['id_reserva']}'>Eliminar</a></td>";
                echo "</tr>";
            }
        }else{
            $table = $_POST['id_mesa'];
            $dia = $_POST['fecha_inicio'];
            $hora = $_POST['hora_reserva'];
            $stmt = $pdo->prepare("SELECT * FROM tbl_reserva where estado_reserva = 1 and id_mesa >= 25 and id_mesa <= 32    and fecha_inicio >= CURDATE() and  hora_reserva <> CURTIME() and id_mesa like '%$table%' and fecha_inicio like '%$dia%' and hora_reserva like '%$hora%' ORDER BY id_reserva DESC");
            $stmt->execute();
            $sentencia=$stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($sentencia as $row){
                echo "<tr class='tbl_eventos'>";
                    echo "<td>{$row["id_reserva"]}</td>";
                    echo "<td>{$row["id_mesa"]}</td>";
                    echo "<td>{$row["fecha_inicio"]}</td>";
                    echo "<td>{$row["hora_reserva"]}</td>";
                    echo "<td>{$row["nombre_cliente"]}</td>";
                    echo "<td><a class='btn btn-warning' href='../process/modificarform-verde.php?id={$row['id_reserva']}'>Modificar</a></td>";
                    echo "<td><a class='btn btn-danger' href='../process/liberar-verde.php?id={$row['id_reserva']}'>Eliminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>