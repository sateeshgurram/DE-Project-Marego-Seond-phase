<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grouptickets
 *
 * @ORM\Table(name="grouptickets", indexes={@ORM\Index(name="tid_idx", columns={"T_id"})})
 * @ORM\Entity
 */
class Grouptickets
{
    /**
     * @var string
     *
     * @ORM\Column(name="ticketname", type="string", length=45, nullable=false)
     */
    private $ticketname;

    /**
     * @var \Tickets
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Tickets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="T_id", referencedColumnName="T_id")
     * })
     */
    private $grid;


}
