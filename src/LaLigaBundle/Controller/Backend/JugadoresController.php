<?php

namespace LaLigaBundle\Controller\Backend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaLigaBundle\Entity\Jugadores;
use LaLigaBundle\Form\JugadoresType;

/**
 * Jugadores controller.
 *
 */
class JugadoresController extends Controller
{
    /**
     * Lists all Jugadores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jugadores = $em->getRepository('LaLigaBundle:Jugadores')->findAll();

        return $this->render('LaLigaBundle:Backend\\Jugadores:index.html.twig', array(
            'jugadores' => $jugadores,
        ));
    }

    /**
     * Creates a new Jugadores entity.
     *
     */
    public function newAction(Request $request)
    {
        $jugadores = new Jugadores();
        $form = $this->createForm('LaLigaBundle\Form\JugadoresType', $jugadores);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jugadores);
            $em->flush();

            return $this->redirectToRoute('backend_jugadores_index');
        }

        return $this->render('LaLigaBundle:Backend\\Jugadores:new_edit.html.twig', array(
            'jugadores' => $jugadores,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jugadores entity.
     *
     */
    public function showAction(Jugadores $jugadores)
    {
        return $this->render('LaLigaBundle:Backend\\Jugadores:show.html.twig', array(
            'jugadores' => $jugadores,
        ));
    }

    /**
     * Displays a form to edit an existing Jugadores entity.
     *
     */
    public function editAction(Request $request, Jugadores $jugadores)
    {
        $editForm = $this->createForm('LaLigaBundle\Form\JugadoresType', $jugadores);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jugadores);
            $em->flush();

            return $this->redirectToRoute('backend_jugadores_index');
        }

        return $this->render('LaLigaBundle:Backend\\Jugadores:new_edit.html.twig', array(
            'jugadores' => $jugadores,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Jugadores entity.
     *
     */
    public function deleteAction(Request $request, Jugadores $jugadores)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($jugadores);
        $em->flush();

        return $this->redirectToRoute('backend_jugadores_index');
    }

}
