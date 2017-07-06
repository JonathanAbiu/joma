<?php

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;

class CiudadTable {
  protected $tableGateway;

  public function __construct(TableGateway $tableGateway) {
    $this->tableGateway = $tableGateway;
  }

  public function fetchAll() {
    $resultset = $this->tableGateway->select();
    return $resultset;
  }

  public function ciudad($codigo) {
    $rowset = $this->tableGateway->select(array('codigo'=>$codigo));
    $row = $rowset->current();
    if (!$row) {
      throw new \Exception("El código no existe");
    }
    return $row;
  }

  public function guardar(Ciudad $ciudad){
    $data = array(
      'codigo' => $ciudad->codigo,
      'nombre' => $ciudad->nombre,
      'apellidoPaterno' => $ciudad->apellidoPaterno,
      'apellidoMaterno' => $ciudad->apellidoMaterno,
      'rfc' => $ciudad->rfc,
      'telefono' => $ciudad->telefono,
      'email' => $ciudad->email,
      'direccion' =>$ciudad->direccion,

    );
    $this->tableGateway->insert($data);
  }
  public function editar(Ciudad $ciudad)
  {
	  $data =[
				'nombre' => $ciudad->nombre,
				];
				$codigo = $ciudad->codigo;
				if (! $this->ciudad($codigo)){
					throw new RuntimeException(sprintf('No se puede actualizar con el codigo %d; No existe',
					$codigo));
				}
				$this->tableGateway->update($data, ['codigo' => $codigo]);

  }
  
  public function eliminar ($id)
  {
	  $this->tableGateway->delete(array('codigo' => $id));
  }
}
