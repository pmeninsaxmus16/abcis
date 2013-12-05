<?php
namespace ABC\AdmissionBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MenuRepository
 */

class ApplicantRepository extends EntityRepository
{
    
    /*Para las busquedas*/
   public function findApplicantSearch($search)
    {
        $search = '%'.$search.'%';
        $dql = "SELECT a.id, a.surname, a.forename, a.dob, a.entryGrade, r.name FROM ABCAdmissionBundle:Applicant a join a.status r WHERE CONCAT(CONCAT(CONCAT(CONCAT(CONCAT(a.surname,' '),' '),a.forename),' '),r.name) like '$search'";	
        $repositorio = $this->getEntityManager()->createQuery($dql);
        return $repositorio->getResult();	
    } 
    
    
    
    
    
    
    /*Funcion del Repositorio para extraer los datos del aplicante al index*/
    public function findApplicant()
    {
        $em = $this->getEntityManager('admission');
        $dql='SELECT a.id, a.surname, a.forename, a.dob, a.entryGrade, r.name FROM ABCAdmissionBundle:Applicant a join a.status r';    
        $query = $em->createQuery($dql);         
        $resultado = $query->getResult();        
        return $resultado;                
    }
    
    /*Funcion que extrae los resultados de la tabla result y los parentecos de la tabla relationship
      del aplicante, recibe como parametros el id del aplicante     */
    public function findResults($id)
    {
        $em = $this->getEntityManager('admission');
        $dql = "SELECT r.name, l.name liv FROM ABCAdmissionBundle:Applicant a join a.status r join a.living l where a.id='$id'";  
        $query = $em->createQuery($dql);         
        $result = $query->getResult();        
        return $result;                
    }
    
    
    /**/
    public function findSchool($id)
    {
        $em = $this->getEntityManager('admission');
        $dql = "SELECT u, a FROM ABCAdmissionBundle:SchoolRecord u JOIN u.address a WHERE u.applicant='$id' and u.isCurrent='true'";  
        $query = $em->createQuery($dql);         
        $school = $query->getResult();       
        return $school;                
    }
    
    
    /**/
    public function findContact($id)
    {
        $em = $this->getEntityManager('admission');
        $dql = "SELECT c.id, c.surname, c.forename, c.middle, c.idType, c.idNumber, c.citizenship, c.languagesSpoken, c.schoolAttended, c.abcPromotionyear, c.isPayer, c.responsible, c.eMail, c.homePhonenumber, c.mobilePhonenumber, c.employer, c.position, m.name marital, r.name FROM ABCAdmissionBundle:Contact c join c.relationship r join c.maritalStatus m WHERE c.applicant='$id'";  
        $query = $em->createQuery($dql);         
        $contact = $query->getResult();        
        return $contact;                
    }
    
    
    
    /**/
    public function findResult($id)
    {
        $em = $this->getEntityManager('admission');
        $dql = "SELECT s,a FROM ABCAdmissionBundle:SchoolUseAdmin s JOIN s.applicant a WHERE a.id=$id order by s.dateOfInterview desc";
        $query = $em->createQuery($dql);         
        $results = $query->getResult();        
        return $results;                
    }
    
    
}
