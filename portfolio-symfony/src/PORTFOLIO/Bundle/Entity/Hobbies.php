<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Hobbies
 *
 * @ORM\Table(name="hobbies")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\HobbiesRepository")
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
    private $hbicon='default.jpg';
    // On ne mappe pas cette propriété car elle n'est pas liée à la base de donnée, elle va simplement nous permettre de manipuler la (les)photos d'un produit avant de l'enregistrer. 
    private $file;



    /**
     * Get idhobbie
     *
     * @return integer
     */
    public function getIdhobbie()
    {
        return $this->idhobbie;
    }

    /**
     * Set hbhobbie
     *
     * @param string $hbhobbie
     *
     * @return Hobbies
     */
    public function setHbhobbie($hbhobbie)
    {
        $this->hbhobbie = $hbhobbie;

        return $this;
    }

    /**
     * Get hbhobbie
     *
     * @return string
     */
    public function getHbhobbie()
    {
        return $this->hbhobbie;
    }

    /**
     * Set hbdescription
     *
     * @param string $hbdescription
     *
     * @return Hobbies
     */
    public function setHbdescription($hbdescription)
    {
        $this->hbdescription = $hbdescription;

        return $this;
    }

    /**
     * Get hbdescription
     *
     * @return string
     */
    public function getHbdescription()
    {
        return $this->hbdescription;
    }

    /**
     * Set hbicon
     *
     * @param string $hbicon
     *
     * @return Hobbies
     */
    public function setHbicon($hbicon)
    {
        $this->hbicon = $hbicon;

        return $this;
    }

    /**
     * Get hbicon
     *
     * @return string
     */
    public function getHbicon()
    {
        return $this->hbicon;
    }

    /**
     * Set file
     *
     * @param object UploadedFile
     *
     * @return Hobbies
     * 
     * L'objet UploadedFile de SF, nous permet de gérer tout ce qui est lié à un fichier uplodé  ($_FILES ==> nom, taille, type, code erreur, emplacement temporaire)
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return object UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function uploadPhoto()
    {
        // S'il n'y a pas de fichier chargé dans l'objet alors on sort de la fonction 
        if(!$this->file)
        {
            return;
        }

        // Récupère le nom de la photo pour le renomer.
        $hbicon = $this -> renameFile($this->file->getClientOriginalName());
        //$name = renameFile('avatar.jpg') 

        // On enregistre en BDD le nouveaux nom ede la photo : 
        $this->photo = $hbicon;

        // Enfin il faut déplacer la photo dans son dossier définitif.
        $this->file->move($this->photoDir(), $hbicon);
    }
    public function renameFile($hbicon)
    {
        // avatar.jpg
        // file_150000000_4568_avatar.jpg
        return 'file_' . time() . '_' . rand(1, 9999) . $hbicon;
    }
    public function photoDir()
    {
        return __DIR__ . '{{ asset("photo") }}';
    }
}
