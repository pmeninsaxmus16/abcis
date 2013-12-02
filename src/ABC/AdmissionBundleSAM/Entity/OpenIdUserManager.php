<?php
namespace ABC\admissionBundle\Entity;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.0.x
use Fp\OpenIdBundle\Model\UserManager;
use Fp\OpenIdBundle\RelyingParty\RecoveredFailureRelyingParty;
use ABC\admissionBundle\Entity\Users;
class OpenIdUserManager extends UserManager {
	private $em;
	private $im;

	public function __construct(  $identityManager,  $em ) {
	        parent::__construct($identityManager);
	        $this->em = $em;
	        $this->im = $identityManager;
	    }

    public function createUserFromIdentity( $identity, array $attributes = array()) {	
		$email= $attributes['contact/email'];
        $user=$this->em->getRepository('ABCadmissionBundle:Users')->findOneBy(array('emailAddress' => $email));

		$userIdentity = new OpenIdIdentity();
		if($user){
        	$userIdentity->setIdentity($identity);
			$userIdentity->setAttributes($attributes);
        	$userIdentity->setUser($user);
        	$this->em->persist($userIdentity);
        	$this->em->flush();
			
		}
		return $userIdentity;
		
		
        
    }

    public function getIdentityManager(){
    	return $this->identityManager;
    }
}
