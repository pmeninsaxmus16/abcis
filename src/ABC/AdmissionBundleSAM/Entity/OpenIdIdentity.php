<?php
namespace ABC\admissionBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Fp\OpenIdBundle\Entity\UserIdentity as BaseUserIdentity;
use Fp\OpenIdBundle\Model\UserIdentityInterface;
use Fp\OpenIdBundle\Model\IdentityInterface;
/**
 * @ORM\Entity
 * @ORM\Table(name="openid_identities")
 */
//class OpenIdIdentity extends BaseUserIdentity 
class OpenIdIdentity extends BaseUserIdentity 
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	/**
     * The relation is made eager by purpose. 
 	 * More info here: {@link https://github.com/formapro/FpOpenIdBundle/issues/54}
 	 *	
     * @var Symfony\Component\Security\Core\User\UserInterface
 	 *
     * @ORM\ManyToOne(targetEntity="ABC\admissionBundle\Entity\Users", fetch="EAGER")	
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    protected $user;

    public function __construct() {
        parent::__construct();

        $now = new \DateTime();
        $this->createdDate = $now;
    }
}
