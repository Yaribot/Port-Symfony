<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competences
 *
 * @ORM\Table(name="competences")
 * @ORM\Entity
 */
class Competences
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcompetence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcompetence;

    /**
     * @var string
     *
     * @ORM\Column(name="cptechnology", type="string", length=255, nullable=false)
     */
    private $cptechnology;

    /**
     * @var integer
     *
     * @ORM\Column(name="cplevel", type="integer", nullable=false)
     */
    private $cplevel;


}

