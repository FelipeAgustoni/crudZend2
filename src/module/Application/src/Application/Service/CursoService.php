<?php

namespace Application\Service;


use Application\Entity\Curso;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\Hydrator\ClassMethods;

class CursoService
{

    public static $entity = 'Application\Entity\Curso';

    protected $em;
    protected $sm;
    protected $entityManager;

    public function __construct(ServiceManager $sm, EntityManager $em)
    {
        $this->sm = $sm;
        $this->em = $em;
    }

    public function getServiceManager(){
        return $this->sm;
    }

    public function getEntityManager(){
        return $this->em;
    }

    public function getRepository(){
        return $this->getEntityManager()->getRepository(self::$entity);
    }

    public function findAll(){
        return $this->getRepository()->findAll();
    }

    public function save(Array $data = array()){
        if(isset($data['id'])){
            $entity = $this->em->getReference(self::$entity, $data['id']);
            $hydrator = new ClassMethods();
            $hydrator->hydrate($data, $entity);
        }else{
            $entity   = new Curso($data);
            $hydrator = new ClassMethods();
            $hydrator->hydrate($data, $entity);
        }
    }

    public function salvar($entity){
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(Array $data = array()){
        $entity = $this->em->getRepository($this->entity->findOneBy($data));

        if($entity){
            $this->em->remove($entity);
            $this->em->flush();

            return $entity;
        }

    }



}