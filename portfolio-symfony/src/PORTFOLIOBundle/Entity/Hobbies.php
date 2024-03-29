<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobbies
 *
 * @ORM\Table(name="hobbies")
 * @ORM\Entity
 */
class Hobbies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhobbie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="hbhobbie", type="string", length=200, nullable=false)
     */
    private $hbhobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="hbdescription", type="string", length=150, nullable=false)
     */
    private $hbdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="hbicon", type="string", length=255, nullable=false)
     */
    private $hbicon;


}

