<?php

namespace deproject\firstBundle\Entity;




use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Tests\StringableObject;





/**
 * Soldtickets
 *
 * @ORM\Table(name="soldtickets", indexes={@ORM\Index(name="TID_idx", columns={"T_id"}), @ORM\Index(name="CID_idx", columns={"C_id"}), @ORM\Index(name="gid_idx", columns={"G_id"}), @ORM\Index(name="IDX_B7744985550C4ED", columns={"pid"})})
 * @ORM\Entity
 */
class Soldtickets extends Controller
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * 
     */
    private $date;

    /**
     * @var \Tickets
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="T_id", referencedColumnName="T_id")
     * })
     */
    private $ticket;

    /**
     * @var \PriceCategory
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="PriceCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="C_id", referencedColumnName="C_id")
     * })
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \GrantType
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="GrantType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="G_id", referencedColumnName="G_id")
     * })
     */
    private $granttype;

   /* /**
     * @var float
     * 
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     *
     */
    /*private $total;*/

    /**
     * @var \Partners
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Partners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pid", referencedColumnName="pid")
     * })
     */
    private $partner;
    
   
    private $priceperticket;
      
 
   
    
    public function getQuantity()
    {
    	return $this->quantity;
    }
    
    public function setPrice($priceperticket)
    
    {
    	$this->priceperticket=$priceperticket;
    }
    
    public function getTotal()
    {
    	
    	return $this->quantity * $this->priceperticket;
    }
    
    public function getTicket()
    {
    	return $this->ticket;
    }
    
    public function getcategory()
    {
    	return $this->category;
    }
    
    public function getgrantType()
    {
    	return $this->granttype;
    }
    
    public function getpartner()
    {
    	return $this->partner;
    }
    
    public function getdate()
    {
    	return $this->date;
    }
    
   public function setTicket($ticket)
   {
   		$this->ticket = $ticket;
   	
   		return $this;
   }
   
 
   public function  setDate($date)
   {
   		$this->date = $date;
   		return $this;
   }
   
   public function setcategory($category)
   {
   	$this->category = $category;
   
   	return $this;
   } 
   
   public function setgrantType($granttype)
   {
   	$this->granttype = $granttype;
   
   	return $this;
   }
   
   public function setpartner($partner)
   {
   	$this->partner = $partner;
   	 
   	return $this;
   }
   
   /*public function setTotal($total)
   {
   	$this->total = $total;
   	 
   	return $this;
   }*/
   
   public function setQuantity($quantity)
   {
   	$this->quantity = $quantity;
   	 
   	return $this;
   }
    	

  /* public function __toString()
   {
   	return (string) $this->date;
   } */
 
    	
}

