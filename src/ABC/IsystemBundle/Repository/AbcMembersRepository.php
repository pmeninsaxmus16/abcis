<?php
namespace ABC\IsystemBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MenuRepository
 */
class AbcMembersRepository extends EntityRepository
{
    
    /**/
    public function findMembersSearch($search)
    {
        $search = '%'.$search.'%';
        $dql = "SELECT ae FROM ABCIsystemBundle:AbcMembers ae  WHERE CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(ae.lastname,' '),ae.firstname), ' '),ae.middlename),' '),ae.idCard),' '),ae.login),' '),ae.sitewideLogin) like '$search' ORDER BY ae.lastname";	
        $repositorio = $this->getEntityManager()->createQuery($dql);
        return $repositorio->getResult();	
    } 
    
    
    /*Funcion del Repositorio para extraer todos los estudiantes sin filtro de busquedas*/
    public function findStudent()
    {
        //$search = '%'.$search.'%';
        $dql = "SELECT ae FROM ABCIsystemBundle:AbcMembers ae  WHERE ae.idCard like'__02%' and ae.status='active'";	
        $repositorio = $this->getEntityManager()->createQuery($dql);
        return $repositorio->getResult();	
    } 
    
    
    
    public function findStudentSearch($search)
    {
        $search = '%'.$search.'%';
        $dql = "SELECT ae FROM ABCIsystemBundle:AbcMembers ae  WHERE (CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(ae.lastname,' '),ae.firstname), ' '),ae.middlename),' '),ae.idCard),' '),ae.login),' '),ae.sitewideLogin) like '$search') and (ae.idCard like'__02%' and ae.status='active') ORDER BY ae.lastname";	
        $repositorio = $this->getEntityManager()->createQuery($dql);
        return $repositorio->getResult();	
    } 
    
    
}
