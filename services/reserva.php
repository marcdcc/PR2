<?php 
class Reserva{
  public $id_reserva;
  public $fecha_inicio;
  public $hora_reserva;
  public $nombre_cliente;
  public $num_personas;
  public $id_mesa;
  public $estado_reserva;
 public function __construct($id_reserva,$fecha_inicio,$hora_reserva,$nombre_cliente,$num_personas,$id_mesa,$estado_reserva){
    $this->id_reserva=$id_reserva;
    $this->fecha_inicio=$fecha_inicio;
    $this->hora_reserva=$hora_reserva;
    $this->nombre_cliente=$nombre_cliente;
    $this->num_personas=$num_personas;
    $this->id_mesa=$id_mesa;
    $this->estado_reserva=$estado_reserva;
 }

}