<?php

namespace LaLigaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jugadores
 *
 * @ORM\Table(name="jugadores")
 * @ORM\Entity(repositoryClass="LaLigaBundle\Repository\JugadoresRepository")
 */
class Jugadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

   /**
     * @var \LaLigaBundle\Entity\Club
     *
     * @ORM\ManyToOne(targetEntity="LaLigaBundle\Entity\Club", inversedBy="Jugadores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_club", referencedColumnName="id")
     * })
     */
    private $Club;
        
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Jugadores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Set club
     *
     * @param \LaLigaBundle\Entity\Club $club
     *
     * @return Jugadores
     */
    public function setClub(\LaLigaBundle\Entity\Club $club = null)
    {
        $this->Club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \LaLigaBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->Club;
    }
}
