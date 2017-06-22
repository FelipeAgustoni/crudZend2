<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $cursos        = $entityManager->getRepository('Application\Entity\Curso')->findAll();

        return new ViewModel();
    }
}
