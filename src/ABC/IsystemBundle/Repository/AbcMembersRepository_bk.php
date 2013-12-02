<?php
namespace ABC\IsystemBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MenuRepository
 */
class AbcMembersRepository extends EntityRepository
{
    public function findMembersSearch($search)
    {
        $search = '%'.$search.'%';
        $dql = "SELECT ae FROM ABCIsystemBundle:AbcMembers ae  WHERE CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(ae.lastname,' '),ae.firstname), ' '),ae.middlename),' '),ae.idCard),' '),ae.login),' '),ae.sitewideLogin) like '$search' ORDER BY ae.lastname";	
        $repositorio = $this->getEntityManager()->createQuery($dql);
        return $repositorio->getResult();	
    } 
}
