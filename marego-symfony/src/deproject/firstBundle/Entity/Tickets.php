<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets")
 * @ORM\Entity
 */
class Tickets
{
	
	
    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\Column(name="T_id", type="integer", nullable=false)
     */
    private $tId;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="tname", type="string", length=45, nullable=false)
     */
    private $tname;
    
 public function getTid()
    {
    	return $this->tId;
    }

    public function setTid($tId)
    {
    	$this->tId = $tId;
    
    	return $this;
    }
    public function getTname()
    {
    	return $this->tname;
    }
    
    public function setTname($tname)
    {
    	$this->tname = $tname;
    
    	return $this;
    }
    
    public function __toString()
    {
    	return $this->tname;
    }
}
