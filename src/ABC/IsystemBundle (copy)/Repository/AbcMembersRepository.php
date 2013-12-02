<?php
namespace ABC\IsystemBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MenuRepository
 */
class AbcMembersRepository extends EntityRepository
{
    /**
    * Busca un mienbro que coincida con lo que se ha enviado a la funcion.
    */
    public function findMembersSearch($search)
    {
    $search = $search.'%';
    $dql = "SELECT ae FROM ABCIsystemBundle:AbcMembers ae  WHERE ae.lastname like '$search' or ae.idCard like '$search' or ae.firstname like '$search'";	
    $repositorio = $this->getEntityManager()->createQuery($dql);
    return $repositorio->getResult();	
    } 
}
