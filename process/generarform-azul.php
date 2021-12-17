<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="../css/vista-azul.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
<div class='log'>
<a href='../process/logout.php' class='btn btn-light' style='padding-left: 60px;padding-right: 60px; border-color: black' color: black;>Logout</a>
</div>
<div class='inicio'>
<a href='../view/vista-azul.php' class='btn btn-primary' style='padding-left: 60px;padding-right: 60px; background-color: #1c497a;'>Back</a>
</div>

<form action="generarpdo-azul.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Generar reserva</h2>
        <div class=alert id='mensaje'></div>
        <p>Dia de la reserva</p>
        <input type="date" id="fecha_inicio" min="<?php echo date("Y-m-d"); ?>">
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
                <option value="24:00">24:00h</option>º
        </select>
        <br>
        <p>Introduce el nombre del titular de la reserva</p>
        <input type="text" name="nombre_cliente" id='nombre_cliente'>
        <br>
        <input type="hidden" name="id_mesa" value="<?php echo $_GET['id'] ?>">
        <br>
        <input type="submit" value="Reservar" class="btn btn-dark" style='padding-left: 30px;padding-right: 30px; background-color: #1c497a;'>
</form>
</body>
</html>