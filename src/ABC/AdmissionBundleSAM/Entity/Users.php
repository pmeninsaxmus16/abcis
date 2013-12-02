<?php

namespace ABC\AdmissionBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * ABC\admissionBundle\Entity\Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users implements UserInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $idCard
     *
     * @ORM\Column(name="id_card", type="string", length=45, nullable=true)
     */
    private $idCard;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;
    
	/**
     * @var string $username
     *
     * @ORM\Column(name="email_address", type="string", length=45, nullable=false)
     */
    private $emailAddress;
    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var Roles
     *
     * @ORM\ManyToMany(targetEntity="Roles")
     * @ORM\JoinTable(name="user_role",
     *   joinColumns={
     *     @ORM\JoinColumn(name="session_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     *   }
     * )
     */
    private $roles;

    public function __construct()
    {
        
	    $this->salt = md5(uniqid(null, true));
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idCard
     *
     * @param string $idCard
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;
    }

    /**
     * Get idCard
     *
     * @return string 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmailAddress($email)
    {
        $this->emailAddress = $email;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
	
    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add user_roles
     *
     * @param ABC\admissionBundle\Entity\Roles $userRoles
     */
    public function addRoles(\ABC\admissionBundle\Entity\Roles $userRole)
    {
        $this->roles[] = $userRole;
    }
 	
	public function setUserRoles($roles) {
        $this->roles = $roles;
    }

    /**
     * Get user_roles
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->roles;
    }
    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

	/**
	* Compares this user to another to determine if they are the same.
	*
	* @param UserInterface $user The user
	* @return boolean True if equal, false othwerwise.
	*/
	public function equals(UserInterface $user) {
	        return md5($this->getUsername()) == md5($user->getUsername());

	}

	/**
	* Erases the user credentials.
	*/
	public function eraseCredentials() {

	}
	public function __toString()
	    {
	        
			return $this->getUsername();

	    }
}
