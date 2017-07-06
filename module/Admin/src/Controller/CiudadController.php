<?php

namespace Admin\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\TablasFactory;
use Admin\Model\Form;
use Admin\Form\CiudadForm;
use Admin\Model\Ciudad;


class CiudadController extends AbstractActionController
{
    private $ciudadTable;

    public function __construct($sm) {
        $this->ciudadTable = (new TablasFactory($sm))->getTableCiudad();
    }

    public function indexAction()
    {
        return new ViewModel(['ciudades' => $this->ciudadTable->fetchAll(),]);
    }

    public function nuevoAction()
    {
         $form = new CiudadForm();
		 $request =$this ->getRequest();
		 
		 if(! $request->isPost()) {
			 return new ViewModel (['form' => $form]);
		 }
		 $ciudad =new Ciudad();
		 $form->setData($request->getPost());
		 
		 if (! $form->isValid()){
			 return new ViewModel(['form' => $form]);
		 }
		 $ciudad->exchangeArray($form->getData());
		 $this->ciudadTable->guardar($ciudad);
		 return $this->redirect()->toRoute('ciudad');
    }
	

    public function editarAction()
    {        
        $id = $this->params()->fromRoute('id', 0);
		
		try{
			$ciudad = $this->ciudadTable->ciudad($id);
		} catch (\Exception $e){
			return $this->redirect()->toRoute('ciudad',['action' => 'index']);
		}
		$form =new CiudadForm();
		$form->bind($ciudad);
		$form->get('enviar')->setAttribute('value', 'Edit');
		
		$request = $this->getRequest();
		$viewData = ['id' =>$id, 'form' => $form];
		if (! $request->isPost()){
			return $viewData;
		}
		
		$form->setData($request->getPost());
		if (! $form->isValid()){
			return $viewData;
		}
		$this->ciudadTable->editar($ciudad);
		return $this->redirect()->toRoute('ciudad', ['action' => 'index']);
	
    }
	public function deleteAction()
	{
		$id = $this->params()->fromRoute('id', '0');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
		
			if ($del == 'Yes') {
				$id = $request->getPost('id');
				$this->ciudadTable->eliminar($id);
			} else {
			}
			
			return $this->redirect()->toRoute('ciudad',['action' => 'index']);
		} else {
			return [
				'codigo' => $id,
				'ciudad' => $this->ciudadTable->ciudad($id)
			];
		}
	}
}