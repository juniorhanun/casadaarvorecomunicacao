<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VoucherController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

