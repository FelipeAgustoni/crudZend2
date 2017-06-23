<?php

namespace Application\Controller;

use Application\Form\CadastrarCurso;
use Application\Form\ConsultarCurso;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Exception;
use Application\Entity\Curso;

class IndexController extends AbstractActionController
{
    public function cadastrarAction()
    {
        $form = new CadastrarCurso('CadastrarCurso');
        return new ViewModel(array('form' => $form));
    }

    public function consultarAction(){
        $form = new ConsultarCurso('ConsultarCurso');
        return new ViewModel(array('form' => $form));
    }

    public function salvarCursoAction(){
        $request = $this->getRequest();
        $post = $request->getPost()->toArray();
        if($post){
            try{
                $curso = new Curso();
                $curso->setNoCurso($post['nmCurso']);
                $curso->setSgCurso($post['sgCurso']);
                $curso->setChCurso($post['chCurso']);
                $cursoService = $this->getServiceLocator()->get('CursoService');
                $cursoService->salvar($curso);
                $msg = $post['idCurso'] ? "Dado(s) alterado(s) com sucesso !" : "Dado(s) salvo com sucesso !";
                $retorno = array('msg' => $msg, 'status' => 'sucesso');
            }catch (Exception $e){
                $retorno = array('msg' => 'Erro ao salvar o(s) dado(s)', 'status' => 'erro');
            }
        }else{
            $retorno = array('msg' => 'Erro ao salvar o(s) dado(s)', 'status' => 'erro');
        }
        return $this->getResponse()->setContent(json_encode($retorno));
    }

    public function listarCursoAction(){
        $request = $this->getRequest();
        $post = $request->getPost()->toArray();
        $retorno = array('msg' => 'ajax retornado');
        return $this->getResponse()->setContent(json_encode($retorno));
    }


}
