<?php
/**
 * namespace para nosso modulo Admin\Form
 */
namespace Admin\Form;


use Admin\Form\Filter\AdminFilter;
use Zend\Form\Element\Email;
use Zend\Form\Element\Password;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * class AdminForm
 * Controller Responsavel por manipular o Formulario Admin
 * @author Winston Hanun Junior <ceo@sisdeve.com.br> skype ceo_sisdeve
 * @copyright (c) 2014, Winston Hanun Junior
 * @link http://www.sisdeve.com.br
 * @version V0.1
 * @package Admin\Controller
 */
class AdminForm extends Form
{
    public function __construct()
    {
        parent::__construct("AdminForm");
        $this->setAttributes(array(
            'method' => 'POST',
            'role' => 'form'
        ));

        $this->setInputFilter(new AdminFilter());

        //Input nome
        $nome = new Text('nome');
        $nome->setLabel('nome.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'nome',
                'placeholder' => 'nome.:',
            ));
        $this->add($nome);

        //Input login
        $login = new Text('login');
        $login->setLabel('login.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'login',
                'placeholder' => 'login.:',
            ));
        $this->add($login);

        //Input senha
        $senha = new Password('senha');
        $senha->setLabel('senha.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'senha',
                'placeholder' => 'senha.:',
            ));
        $this->add($senha);

        //Input cpf
        $cpf = new Text('cpf');
        $cpf->setLabel('cpf.: ')
            ->setAttributes(array(
                'maxlength' => 20,
                'class' => 'form-control',
                'id' => 'cpf',
                'placeholder' => 'cpf.:',
                'data-mask' => '999.999.999-99'
            ));
        $this->add($cpf);

        //Input rg
        $rg = new Text('rg');
        $rg->setLabel('rg.: ')
            ->setAttributes(array(
                'maxlength' => 20,
                'class' => 'form-control',
                'id' => 'rg',
                'placeholder' => 'rg.:',
            ));
        $this->add($rg);

        //Input email
        $email = new Email('email');
        $email->setLabel('email.: ')
            ->setAttributes(array(
                'maxlength' => 100,
                'class' => 'form-control',
                'id' => 'email',
                'placeholder' => 'email.:',
            ));
        $this->add($email);

        //Input cep
        $cep = new Text('cep');
        $cep->setLabel('cep.: ')
            ->setAttributes(array(
                'maxlength' => 10,
                'class' => 'form-control',
                'id' => 'cep',
                'placeholder' => 'cep.:'
            ));
        $this->add($cep);

        //Input estado
        $estado = new Text('estado');
        $estado->setLabel('estado.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'estado',
                'placeholder' => 'estado.:',
            ));
        $this->add($estado);

        //Input cidade
        $cidade = new Text('cidade');
        $cidade->setLabel('cidade.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'cidade',
                'placeholder' => 'cidade.:',
            ));
        $this->add($cidade);

        //Input bairro
        $bairro = new Text('bairro');
        $bairro->setLabel('bairro.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'bairro',
                'placeholder' => 'bairro.:',
            ));
        $this->add($bairro);

        //Input endereco
        $endereco = new Text('endereco');
        $endereco->setLabel('endereco.: ')
            ->setAttributes(array(
                'maxlength' => 100,
                'class' => 'form-control',
                'id' => 'endereco',
                'placeholder' => 'endereco.:',
            ));
        $this->add($endereco);

        //Input complemento
        $complemento = new Text('complemento');
        $complemento->setLabel('complemento.: ')
            ->setAttributes(array(
                'maxlength' => 45,
                'class' => 'form-control',
                'id' => 'complemento',
                'placeholder' => 'complemento.:',
            ));
        $this->add($complemento);

        // Select status
        $status = new Select('status');
        $status->setLabel('Condição.:')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'status',
            ));
        $status->setValueOptions(array(
            'ATIVO' => 'ATIVO',
            'DESATIVADO' => 'DESATIVADO'
        ));
        $this->add($status);
    }

}