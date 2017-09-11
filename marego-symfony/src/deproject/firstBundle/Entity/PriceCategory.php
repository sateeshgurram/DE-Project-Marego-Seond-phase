<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PriceCategory
 *
 * @ORM\Table(name="price_category")
 * @ORM\Entity
 */
class PriceCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="C_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cId;

    /**
     * @var string
     *
     * @ORM\Column(name="C_name", type="string", length=45, nullable=false)
     */
    private $cName;

    public function getCid()
    {
    	return $this->cId;
    }
    
    public function getcName()
    {
    	return $this->cName;
    }
    
    public function setCid($cId)
    {
    	$this->cId = $cId;
    
    	
    }
    
    public function setCname($cName)
    {
    	$this->cName = $cName;
    }
    
    public function __toString()
    {
    	return $this->cName;
    }
    
}