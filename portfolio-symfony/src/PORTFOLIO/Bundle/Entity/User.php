<?php

namespace PORTFOLIO\Bundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="ufirstname", type="string", length=100, nullable=false)
     */
    private $ufirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="ulastname", type="string", length=100, nullable=false)
     */
    private $ulastname;

    /**
     * @var string
     *
     * @ORM\Column(name="uemail", type="string", length=150, nullable=false)
     */
    private $uemail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=20, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut;

    /**
	* @ORM\Column(name="roles", type="array")
	*
	*/
	private $roles = array();
	
	/**
	*
	* @ORM\Column(name="salt", type="string", length=256, nullable=true)
	*/
    private $salt; 
    
    
	public function setRoles(array $roles){
		$this -> roles = $roles;
		return $this; 
	}
	
	public function getRoles(){
		$roles = $this -> roles; 
		//$roles[] = 'ROLE_USER';
		return $this -> roles; 
	}
	
	/**
	* Fonction obligatoire liée à l'interface UserInterface
	*
	*/
	public function eraseCredentials(){}
	
	
	public function setSalt($salt){
		$this -> salt = $salt;
		return $this;
	}
	
	public function getSalt(){
		return $this -> salt; 
	}



    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set ufirstname
     *
     * @param string $ufirstname
     *
     * @return User
     */
    public function setUfirstname($ufirstname)
    {
        $this->ufirstname = $ufirstname;

        return $this;
    }

    /**
     * Get ufirstname
     *
     * @return string
     */
    public function getUfirstname()
    {
        return $this->ufirstname;
    }

    /**
     * Set ulastname
     *
     * @param string $ulastname
     *
     * @return User
     */
    public function setUlastname($ulastname)
    {
        $this->ulastname = $ulastname;

        return $this;
    }

    /**
     * Get ulastname
     *
     * @return string
     */
    public function getUlastname()
    {
        return $this->ulastname;
    }

    /**
     * Set uemail
     *
     * @param string $uemail
     *
     * @return User
     */
    public function setUemail($uemail)
    {
        $this->uemail = $uemail;

        return $this;
    }

    /**
     * Get uemail
     *
     * @return string
     */
    public function getUemail()
    {
        return $this->uemail;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
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
     * Set statut
     *
     * @param integer $statut
     *
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
