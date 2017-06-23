<?php

namespace Application\Form;

use Application\Entity\Curso;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Form\Hidden;

class CadastrarCurso extends Form
{

    protected $_nome = "CadastrarCurso";

    public function __construct($name = null, array $options = array())
    {
        parent::__construct($this->_nome);

        $this->setAttributes(array(
            'id', $this->_nome,
            'name', $this->_nome,
            'class', $this->_nome,
        ));

        // Nome
        $nmCurso = new Text('nmCurso');
        $nmCurso->setLabel('Nome: ')->setAttributes(array(
           'class' => 'form-control',
           'title' => 'Informe o nome do curso',
           'data-toggle' => 'tooltip',
           'id' => 'nmCurso',
           'maxlength' => 100,
           'required' => true
        ))->setLabelAttributes(array('class' => 'control-label'));
        $this->add($nmCurso);

        // Sigla
        $sgCurso = new Text('sgCurso');
        $sgCurso->setLabel('Sigla: ')->setAttributes(array(
            'class' => 'form-control',
            'title' => 'Informe a sigla do curso',
            'data-toggle' => 'tooltip',
            'id' => 'sgCurso',
            'maxlength' => 10,
            'required' => true
        ))->setLabelAttributes(array('class' => 'control-label'));
        $this->add($sgCurso);

        // Carga Horaria
        $chCurso = new Text('chCurso');
        $chCurso->setLabel('Carga Horaria: ')->setAttributes(array(
            'class' => 'form-control',
            'title' => 'Informe a carga horaria do curso',
            'data-toggle' => 'tooltip',
            'id' => 'chCurso',
            'maxlength' => 4,
            'required' => true
        ))->setLabelAttributes(array('class' => 'control-label'));
        $this->add($chCurso);

    }

}