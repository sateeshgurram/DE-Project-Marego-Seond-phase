<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantType
 *
 * @ORM\Table(name="grant_type")
 * @ORM\Entity
 */
class GrantType
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="G_id", type="integer", nullable=false)
     */
    private $gId;

    /**
     * @var string
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="Grant_name", type="string", length=45, nullable=false)
     */
    private $grantName;
    
    public function getGid()
    {
    	return $this->gId;
    }
    
    public function getgrantName()
    {
    	return $this->grantName;
    }
    
    public function setgrantName($grantName)
    {
    	$this->grantName = $grantName;
    
    	return $this;
    }

    public function __toString()
    {
    	return $this->grantName;
    }

}
