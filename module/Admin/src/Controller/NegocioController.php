<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\TablasFactory;

class NegocioController extends AbstractActionController
{

    public function __construct($sm) {
        //$this->ciudadTable = (new TablasFactory($sm))->getTableNegocio();
    }
    public function indexAction()
    {
        return new ViewModel();
    }

}
