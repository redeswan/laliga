<?php

namespace LaLigaBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class JugadoresFieldSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA    => 'preSetData',
            FormEvents::PRE_SUBMIT      => 'preSubmit'
        );
    }

    private function addJugadoresToForm($form)
    {
        
        $form->add('Jugadores',  EntityType::class, array(
            'class'         => 'LaLigaBundle:Jugadores',
            'choice_label'  => function ($jugadores) {
                return $jugadores->getNombre();
            },
            'label'         => 'Jugadores',
            'placeholder'   => 'Seleccione los jugadores del Club',
            'multiple'      => true,
            'expanded'      => true,
        ));
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $this->addJugadoresToForm($form);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $this->addJugadoresToForm($form);
    }
}   
