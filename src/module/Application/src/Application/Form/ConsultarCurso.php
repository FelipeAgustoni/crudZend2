<?php

namespace Application\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\Http\Header\TE;


class ConsultarCurso extends Form
{

    protected $_nome = "ConsultarCurso";

    public function __construct($name = null, $options = array())
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
            'title' => 'Nome do curso',
            'data-toggle' => 'tooltip',
            'id' => 'nmCurso',
            'maxlength'=> 100
        ))->setLabelAttributes(array('class' => 'control-label'));
        $this->add($nmCurso);

        // Sigla
        $sgCurso = new Text('sgCurso');
        $sgCurso->setLabel('Sigla: ')->setAttributes(array(
            'class' => 'form-control',
            'title' => 'Sigla do curso',
            'data-toggle' => 'tooltip',
            'id' => 'sgCurso',
            'maxlength' => 10
        ))->setLabelAttributes(array('class' => 'control-label'));
        $this->add($sgCurso);


    }

}