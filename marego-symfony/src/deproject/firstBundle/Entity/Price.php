<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="price", indexes={@ORM\Index(name="TID_idx", columns={"T_id"}), @ORM\Index(name="CID_idx", columns={"C_id"})})
 * @ORM\Entity
 */
class Price
{

    /**
     * @var \Tickets
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Tickets",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ticketid", referencedColumnName="T_id")
     * })
     */
    private $ticketid;

    /**
     * @var \PriceCategory
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="PriceCategory",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Catid", referencedColumnName="C_id")
     * })
     */
    private $categoryid;

    /**
     * @var float
     *
     * @ORM\Column(name="priceperticket", type="float",nullable=false)
     */
    private $priceperticket;



    /**
     * Set tid
     *
     * @param integer $tid
     * @return Price
     */
    public function setTicketid($ticketid)
    {
        $this->ticketid = $ticketid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return integer 
     */
    public function getTicketid()
    {
        return $this->ticketid;
    }

    /**
     * Set cid
     *
     * @param integer $cid
     * @return Price
     */
    public function setCategoryid($categoryid)
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return integer 
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }

    /**
     * Set priceperticket
     *
     * @param float $priceperticket
     * @return Price
     */
    public function setPriceperticket($priceperticket)
    {
        $this->priceperticket = $priceperticket;

        return $this;
    }

    /**
     * Get priceperticket
     *
     * @return float 
     */
    public function getPriceperticket()
    {
        return $this->priceperticket;
    }
}
