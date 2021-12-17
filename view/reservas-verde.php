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
        echo "<a href='../view/vista-verde.php' class='btn btn-success' style='padding-left: 60px; padding-right: 60px; background-color: #146025;'>Back</a>";
        echo "</div>";
        echo "<h1>Reservas de la Sala Verde</h1>";

        $stmt = $pdo->prepare("SELECT * FROM tbl_reserva where id_mesa >= 25 and id_mesa <= 32 ORDER BY fecha_inicio ASC");
            $stmt->execute();
            $sentencia=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
        ?>
    </table>
</body>
</html>