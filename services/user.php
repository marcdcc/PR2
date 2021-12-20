<?php 
class User{
  public $id_user;
  public $nom_user;
  public $apellido_user;
  public $email_user;
  public $password_user;
  public $rol_user;
  
 public function __construct($id_user,$nom_user,$apellido_user,$email_user,$password_user,$rol_user){
    $this->id_user=$id_user; 
    $this->nom_user=$nom_user;
    $this->apellido_user=$apellido_user;
    $this->email_user=$email_user;
    $this->password_user=$password_user;
    $this->rol_user=$rol_user;
    
 }

}