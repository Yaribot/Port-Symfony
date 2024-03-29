<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table(name="language")
 * @ORM\Entity
 */
class Language
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idlanguage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="lglanguage", type="string", length=40, nullable=false)
     */
    private $lglanguage;

    /**
     * @var integer
     *
     * @ORM\Column(name="lglevel", type="integer", nullable=false)
     */
    private $lglevel;


}

