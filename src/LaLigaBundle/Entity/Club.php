<?php

namespace LaLigaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="LaLigaBundle\Repository\ClubRepository")
 */
class 
Club
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
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;
    
    
    /**
     * @ORM\Column(name="borrado", type="boolean")
     */
    private $borrado=0;
   

    /**
     * @var \LaLigaBundle\Entity\Jugadores
     * @Assert\Valid 
     * @ORM\OneToMany(targetEntity="LaLigaBundle\Entity\Jugadores", mappedBy="Club" , cascade={"persist", "remove"})
     */        
    private $Jugadores;    

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Jugadores = new \Doctrine\Common\Collections\ArrayCollection();
    }    
    
    
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
     * @return Club
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Club
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }


    /**
     * Set borrado
     *
     * @param boolean $borrado
     *
     * @return Club
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;

        return $this;
    }

    /**
     * Get borrado
     *
     * @return boolean
     */
    public function getBorrado()
    {
        return $this->borrado;
    }

    /**
     * Add jugadore
     *
     * @param \LaLigaBundle\Entity\Jugadores $jugador
     *
     * @return Club
     */
    public function addJugadores(\LaLigaBundle\Entity\Jugadores $jugador)
    {
        $jugador->setClub($this);
        $this->Jugadores[] = $jugador;

        return $this;
    }

    /**
     * Remove jugadore
     *
     * @param \LaLigaBundle\Entity\Jugadores $jugador
     */
    public function removeJugadores(\LaLigaBundle\Entity\Jugadores $jugador)
    {
        $this->Jugadores->removeElement($jugador);
    }

    /**
     * Get jugadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugadores()
    {
        return $this->Jugadores;
    }
}
