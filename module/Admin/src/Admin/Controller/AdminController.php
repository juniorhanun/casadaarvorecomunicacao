<?php
/**
 * namespace para nosso modulo Admin\Controller
 */

namespace Admin\Controller;

use Core\Controller\AbstractController;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
/**
 * class AdminController
 * Controller Responsavel por manipular os dados da Entidade Admin
 * @author Winston Hanun Junior <ceo@sisdeve.com.br> skype ceo_sisdeve
 * @copyright (c) 2014, Winston Hanun Junior
 * @link http://www.sisdeve.com.br
 * @version V0.1
 * @package Admin\Controller
 */

class AdminController  extends AbstractController
{

    // Método Contrutor
    function __construct()
    {
        $this->form = 'Admin\Form\AdminForm';
        $this->controller = 'Admin';
        $this->route = 'admin-admin/default';
        $this->service = 'Admin\Service\AdminService';
        $this->entity = 'Admin\Entity\Admin';
        $this->itemPorPaigina = 20;
        $this->campoOrder = "nome";
        $this->order = "ASC";
        $this->campoPesquisa = "status";
        $this->dadoPesquisa = "ATIVO";
    }
}

