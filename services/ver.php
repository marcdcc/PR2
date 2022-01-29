<?php
include '../services/config.php';
include '../services/conexion.php';

if (isset($_POST['filtre'])) {
    switch ($_POST['filtre']) {
        case 'TODO':
            $ubicacion='%';
            break;
        case 'Terraza':
            $ubicacion=1;
            break;
        case 'Comedor':
            $ubicacion=2;
            break;
    
        default:
            $ubicacion='%';
            break;
    };
}else{
    $ubicacion='%';
}


//CONSULTA QUE ME DE LOS CAMPOS A VISUALIZAR DE MESA
$sentencia = $pdo->prepare("SELECT 
tbl_mesa.id_mesa,
tbl_mesa.reservada,
max(tbl_reserva.id_reserva) as id_reserva,
any_value(tbl_reserva.num_personas) as num_personas,
any_value(tbl_reserva.nombre_cliente) as nombre_cliente,
max(tbl_reserva.fecha_inicio) as fecha_inicio,
tbl_mesa.num_silla_dispo,
tbl_ubicacion.tipo_ubi,
tbl_mesa.id_ubi
from tbl_mesa 
left outer join tbl_reserva on tbl_mesa.id_mesa=tbl_reserva.id_mesa 
left outer join tbl_ubicacion on tbl_ubicacion.id_ubi=tbl_mesa.id_ubi
where tbl_mesa.id_ubi like ?
group by tbl_mesa.id_mesa
order by id_mesa");
$sentencia->bindParam(1, $ubicacion);
$sentencia->execute();
$listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaPersonas);