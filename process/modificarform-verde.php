<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="../css/vista-verde.css">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
        <?php
        include '../services/conexion.php';
        $id_reserva = $_GET['id'];
        $qry = $pdo->prepare("SELECT * FROM tbl_reserva where id_reserva = ?");
        $qry->bindParam(1, $id_reserva);
        $qry->execute();
        $reserva=$qry->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class='log'>
                <a href='../process/logout.php' class='btn btn-light' style='padding-left: 60px;padding-right: 60px; border-color: black; color: black;'>Logout</a>
        </div>
        <div class='inicio'>
                <a href='../view/reservas-verde.php' class='btn btn-dark' style='padding-left: 60px;padding-right: 60px; border-color: white; background-color: #146025;'>Back</a>
        </div>
        <form action="modificarpdo-verde.php" method="post" class="caja" onsubmit="return validar()">
                <h2 class="titulo">Modificar reserva</h2>
                <div class=alert id='mensaje'></div>
                <p>Dia de la reserva</p>
                <input name="fecha_inicio" type="date" id="fecha_inicio" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $reserva['fecha_inicio'] ?>">
                <br>
                <p>Hora de la reserva</p>
                <select name="hora_reserva" id="hora_reserva">
                        <option value="08:00">08:00h</option>
                        <option value="10:00">10:00h</option>
                        <option value="12:00">12:00h</option>
                        <option value="14:00">14:00h</option>
                        <option value="16:00">16:00h</option>
                        <option value="18:00">18:00h</option>
                        <option value="20:00">20:00h</option>
                        <option value="22:00">22:00h</option>
                        <option value="24:00">24:00h</option>
                </select>
                <br>
                <p>Introduce el nombre del titular de la reserva</p>
                <input type="text" name="nombre_cliente" id='nombre_cliente' value="<?php echo $reserva['nombre_cliente'] ?>">
                <br>
                <input type="hidden" name="id_mesa" value="<?php echo $_GET['id_mesa'] ?>">
                <br>
                <input type="submit" value="Modificar reserva" class="btn btn-dark">
        </form>
</body>
</html>