<?php

namespace LaLigaBundle\Services;

use LaLigaBundle\Entity\Club;
use Doctrine\ORM\EntityManager;

class ClubService {

    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em           = $em;
    }

    /**
     * Borrado lógico del club
     * @param \LaLigaBundle\Entity\Club $club
     */
    public function borrar(Club $club)
    {
        $club->setBorrado(1);
        $this->em->flush($club);
    }
    
    
}
