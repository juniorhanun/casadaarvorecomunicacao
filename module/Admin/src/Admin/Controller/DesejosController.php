<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DesejosController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

