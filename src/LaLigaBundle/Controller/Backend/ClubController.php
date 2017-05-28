<?php

namespace LaLigaBundle\Controller\Backend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaLigaBundle\Entity\Club;
use LaLigaBundle\Form\ClubType;

/**
 * Club controller.
 *
 */
class ClubController extends Controller
{
    /**
     * Lists all Club entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clubs = $em->getRepository('LaLigaBundle:Club')->buscarClubs();

        return $this->render('LaLigaBundle:Backend\\Club:index.html.twig', array(
            'clubs' => $clubs,
        ));
    }

    /**
     * Creates a new Club entity.
     *
     */
    public function newAction(Request $request)
    {
        $club = new Club();
        $form = $this->createForm('LaLigaBundle\Form\ClubType', $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $club->getJugadores()->map(
            function($jugadores) use ($em, $club) {
                $jugadores->setClub($club);
                $em->persist($jugadores);
            });
            
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('backend_club_index');
        }

        return $this->render('LaLigaBundle:Backend\\Club:new_edit.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Club entity.
     *
     */
    public function editAction(Request $request, Club $club)
    {
        $editForm = $this->createForm('LaLigaBundle\Form\ClubType', $club);
        $editForm->handleRequest($request);
        
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em             = $this->getDoctrine()->getManager();    
            $club->getJugadores()->map(
            function($jugadores) use ($em, $club) {
                $jugadores->setClub($club);
                $em->persist($jugadores);
            });
            
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('backend_club_index');
        }

        return $this->render('LaLigaBundle:Backend\\Club:new_edit.html.twig', array(
            'club' => $club,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Club entity.
     *
     */
    public function deleteAction(Request $request, Club $club)
    {
        $form = $this->createForm('LaLigaBundle\Form\ClubType', $club);
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            //Borrar Club
            $club_service = $this->get('app.club.service');
            $club_service->borrar($club);        
            return $this->redirectToRoute('backend_club_index');
        }
        
        return $this->render('LaLigaBundle:Backend\\Club:borrar.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
        ));        
    }

}
