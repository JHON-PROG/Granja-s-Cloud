<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    public $numero_doc;
    public $tipo_doc;
    public $nombre;
    public $apellido;
    public $telefono;
    public $ciudad;
    public $direccion;
    public $email;
    public $fechanac;

/// Numero documento
    public function setNumerodoc($numero_doc){
      $this->numero_doc = $numero_doc;
    }

    public function getNumerodoc(){
      return $this->numero_doc;
    }

/// Tipo Documento
    public function setTipodoc($tipo_doc){
      $this->tipo_doc = $tipo_doc;
    }

    public function getTipodoc(){
      return $this->tipo_doc;
    }

/// Nombre
    public function setNombre($nombre){
    $this->nombre = $nombre;
    }

    public function getNombre(){
    return $this->nombre;
    }

//// Apellido

    public function setApellido($apellido){
    $this->apellido = $apellido;
    }

    public function getApellido(){
    return $this->apellido;
    }

//// Telefono
    public function setTelefono($telefono){
    $this->telefono = $telefono;
    }

    public function getTelefono(){
    return $this->telefono;
    }


//// Telefono
    public function setCiudad($ciudad){
    $this->ciudad = $ciudad;
    }

    public function getCiudad(){
    return $this->ciudad;
    }

    //// Direccion
    public function setDireccion($direccion){
    $this->direccion = $direccion;
    }

    public function getDireccion(){
    return $this->direccion;
    }

    //// Email
    public function setEmail($email){
    $this->email = $email;
    }

    public function getEmail(){
    return $this->email;
    }

    //// Fecha Nac
    public function setFechaNac($fechanac){
    $this->fechanac = $fechanac;
    }

    public function getFechaNac(){
    return $this->fechanac;
    }




}
