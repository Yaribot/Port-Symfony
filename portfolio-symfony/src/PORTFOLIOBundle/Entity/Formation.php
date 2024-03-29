<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idformation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformation;

    /**
     * @var string
     *
     * @ORM\Column(name="formtitre", type="string", length=100, nullable=false)
     */
    private $formtitre;

    /**
     * @var string
     *
     * @ORM\Column(name="formsoustitre", type="string", length=150, nullable=false)
     */
    private $formsoustitre;

    /**
     * @var integer
     *
     * @ORM\Column(name="formdate", type="integer", nullable=false)
     */
    private $formdate;

    /**
     * @var string
     *
     * @ORM\Column(name="formdescription", type="string", length=200, nullable=false)
     */
    private $formdescription;


}

