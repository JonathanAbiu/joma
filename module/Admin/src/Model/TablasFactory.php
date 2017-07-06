<?php
namespace Admin\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;

use Admin\Model\CiudadTable;

class TablasFactory {
  protected $sm;

  public function __construct( $sm) {
    $this->sm = $sm;
  }
  public function getTableCiudad() {
    $dbAdapter = $this->sm->get('Zend\Db\Adapter\Adapter');
    $resultSetPrototype = new ResultSet();
    $resultSetPrototype->setArrayObjectPrototype(new Ciudad());
    return new CiudadTable(new TableGateway('ciudad',$dbAdapter
    ,null,$resultSetPrototype));

  }
}
