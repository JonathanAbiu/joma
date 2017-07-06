<?php 
 namespace Admin\Form;
 use Zend\Form\Form;

 use Zend\Form\Form;
 use Zend\Form\Element;
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\Input;
 use Zend\Validator;


 class CiudadForm extends Form{
    
    public function __construct()

    {
    	parent:: __construct('ciudad-form');
    	$this->setAttribute('method','post');

    	$codigo = new Element\Text('codigo',
    	['label' => 'Codigo postal']);
        
        $nombre = new Element\Text('nombre',
        ['label' => 'Nombre']);

         $apellidoPaterno = new Element\Text('apellidoPaterno',
        ['label' => 'apellidoPaterno']);


        $apellidoMaterno = new Element\Text('apellidoMaterno',
        ['label' => 'apellidoMaterno']);

         $rfc = new Element\Text('rfc',
        ['label' => 'rfc']);

          $telefono = new Element\Text('telefono',
        ['label' => 'telefono']);


        $email = new Element\Text('email',
        ['label' => 'email']);

         $direccion = new Element\Text('direccion',
        ['label' => 'direccion']);


        $enviar = new Element\Button('enviar',
        ['label' => 'Aceptar']);
        $enviar->setAttribute('Type','submit');
        
        $this->add($codigo);
        $this->add($nombre);
        $this->add($apellidoPaterno);
        $this->add($apellidoMaterno);
        $this->add($rfc);
        $this->add($telefono);
        $this->add($email);
        $this->add($direccion);
        $this->add($enviar);
        $this->addInputFilter();
    }

     private function addInputFilter()

    {
    	$InputFilter = new InputFilter();
    	$this->SetInputFilter($InputFilter);
    	$codigo = new Validator\Regex("#^\d{5}$#");
    	$inputFilter->add(['name' => 'codigo','herror_message' => 'Debe tener sinco sifras', 
    	'required' = > true,
    	'validators' => [$codigo]]);
     }

    }










    }


 }

