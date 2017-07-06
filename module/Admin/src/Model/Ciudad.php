<?php

namespace Admin\Model;

class Ciudad {
  public $codigo;
  public $nombre;
  public $apellidoPaterno;
  public $apellidoMaterno;
  public $rfc;
  public $telefono;
  public $email;
  public $direccion;
  

  public function exchangeArray($data) {
    $this->codigo = (!empty($data['codigo'])) ? $data['codigo'] : null;
    $this->nombre = (!empty($data['nombre'])) ? $data['nombre'] : null;
    $this->apellidoPaterno = (!empty($data['apellidoPaterno'])) ? $data['apellidoPaterno'] : null;
    $this->apellidoMaterno = (!empty($data['apellidoMaterno'])) ? $data['apellidoMaterno'] : null;
    $this->rfc = (!empty($data['rfc'])) ? $data['rfc'] : null;
    $this->telefono = (!empty($data['telefono'])) ? $data['telefono'] : null;
    $this->email= (!empty($data['email'])) ? $data['email'] : null;
    $this->direccion = (!empty($data['direccion'])) ? $data['direccion'] : null;



  }
  public function getArrayCopy()
  {
	  return [
	  'codigo' => $this->codigo,
	  'nombre' => $this->nombre,
    'apellidoPaterno' => $this->apellidoPaterno,
    'apellidoMaterno' => $this->apellidoMaterno,
    'rfc' => $this->rfc,
    'telefono'=> $this->telefono,
    'email' => $this->email,
    'direccion' => $this->direccion,



	  ];
  }
}

