<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partners
 *
 * @ORM\Table(name="partners", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})})
 * @ORM\Entity
 */
class Partners
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="p_name", type="string", length=100, nullable=false)
     */
    private $pName;

    /**
     * @var string
     *
     * @ORM\Column(name="strasse", type="string", length=45, nullable=false)
     */
    private $strasse;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=false)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=false)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="f_name", type="string", length=45, nullable=true)
     */
    private $fName;

    /**
     * @var string
     *
     * @ORM\Column(name="l_name", type="string", length=45, nullable=true)
     */
    private $lName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=15, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=25, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=14, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=30, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="securitypassword", type="string", length=45, nullable=true)
     */
    private $securitypassword;

public function getPid()
    {
        return $this->pid;
    }
    
    public function getPname()
    {
    	return $this->pName;
    }
    
    public function setPname($pName)
    {
    	$this->pName = $pName;
    
    	return $this;
    }
    
    public function getStrasse()
    {
    	return $this->strasse;
    }
    
    public function setStrasse($strasse)
    {
    	$this->strasse = $strasse;
    
    	return $this;
    }
    
    public function getCity()
    {
    	return $this->city;
    }
    
    public function setCity($city)
    {
    	$this->city = $city;
    
    	return $this;
    }
    
    public function getZipcode()
    {
    	return $this->zipcode;
    }
    
    public function setZipcode($zipcode)
    {
    	$this->zipcode = $zipcode;
    
    	return $this;
    }
    
    public function getFname()
    {
    	return $this->fName;
    }
    
    public function setFname($fName)
    {
    	$this->fName = $fName;
    
    	return $this;
    }
    
    public function getLname()
    {
    	return $this->lName;
    }
    
    public function setLname($lName)
    {
    	$this->lName = $lName;
    
    	return $this;
    }
    
    public function getTitle()
    {
    	return $this->title;
    }
    
    public function setTitle($title)
    {
    	$this->title = $title;
    
    	return $this;
    }
    
    public function getIban()
    {
    	return $this->iban;
    }
    
    public function setIban($iban)
    {
    	$this->iban = $iban;
    
    	return $this;
    }
    
    public function getMail()
    {
    	return $this->mail;
    }
    
    public function setMail($mail)
    {
    	$this->mail = $mail;
    
    	return $this;
    }
    public function getPhone()
    {
    	return $this->phone;
    }
    
    public function setPhone($phone)
    {
    	$this->phone = $phone;
    
    	return $this;
    }
    
    public function getUsername()
    {
    	return $this->username;
    }
    
    public function setUsername($username)
    {
    	$this->username = $username;
    
    	return $this;
    }
    
    public function getSecuritypassword()
    {
    	return $this->securitypassword;
    }
    
    public function setSecuritypassword($securitypassword)
    {
    	$this->securitypassword = $securitypassword;
    
    	return $this;
    }
    
    public function __toString()
    {
    	return $this->pName;
    }

}
