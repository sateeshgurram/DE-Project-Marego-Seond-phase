<?php

namespace deproject\firstBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaregoSymfony
 *
 * @ORM\Table(name="marego_symfony")
 * @ORM\Entity
 */
class MaregoSymfony
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="partner", type="string", length=255, nullable=false)
     */
    private $partner;


}
