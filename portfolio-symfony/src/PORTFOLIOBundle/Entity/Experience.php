<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity
 */
class Experience
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idxp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idxp;

    /**
     * @var integer
     *
     * @ORM\Column(name="xpyear1", type="integer", nullable=false)
     */
    private $xpyear1;

    /**
     * @var integer
     *
     * @ORM\Column(name="xpyear2", type="integer", nullable=false)
     */
    private $xpyear2;

    /**
     * @var string
     *
     * @ORM\Column(name="xpfunction", type="string", length=100, nullable=false)
     */
    private $xpfunction;

    /**
     * @var string
     *
     * @ORM\Column(name="xpemployer", type="string", length=100, nullable=false)
     */
    private $xpemployer;

    /**
     * @var string
     *
     * @ORM\Column(name="xpresume", type="string", length=250, nullable=false)
     */
    private $xpresume;


}

