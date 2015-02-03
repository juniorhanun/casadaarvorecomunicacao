<?php

namespace Admin\Controller;

use Admin\Entity\Admin;
use Core\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{

    public function indexAction()
    {
        $form = new LoginForm();

        if($this->getRequest()->isPost()):
            $form->setData($this->getRequest()->getPost()->toArray());
            if($form->isValid()):
                $data = $form->getData();

                /**
                 * @var $auth \Zend\Authentication\AuthenticationService
                 * @var $adapter \Core\Auth\Adapter
                 */
                $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter = $auth->getAdapter();
                $adapter->setEntity('Admin\Entity\Admin')
                        ->setMetodoLogin('loginAdmin')
                        ->setLogin($data['login'])
                        ->setSenha($data['senha']);

                if($auth->authenticate()->isValid()) :
                    // Redireciona para a index do Controller
                    return $this->redirect()
                        ->toRoute('admin-home', array('controller' => 'index',));
                endif;

                $mensagem = $auth->authenticate()->getMessages();
                $this->flashMessenger()->addErrorMessage($mensagem[0]);
                // Redireciona para a index do Controller
                return $this->redirect()
                    ->toRoute('admin-auth', array('controller' => 'auth',));
            endif;

            //var_dump($datas);
            //die("AuthController L 19");
        endif;


        /**
         * @var $entityManager \Doctrine\ORM\EntityManager
         *
        $entityManager = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $admin = $entityManager->getRepository('Admin\Entity\Admin')
                               ->loginAdmin(new Admin(), 'hanunjunior','Linux1009');
        var_dump($admin);*/

        return new ViewModel(array('form' => $form));
    }


}

