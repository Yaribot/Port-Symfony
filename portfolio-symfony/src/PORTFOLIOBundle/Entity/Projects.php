<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity
 */
class Projects
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idproject", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproject;

    /**
     * @var string
     *
     * @ORM\Column(name="pjtitle", type="string", length=50, nullable=false)
     */
    private $pjtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="pjlink", type="string", length=255, nullable=false)
     */
    private $pjlink;


}

