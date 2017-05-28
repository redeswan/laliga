<?php

namespace LaLigaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use LaLigaBundle\Form\EventListener\JugadoresFieldSubscriber;

class ClubType extends AbstractType
{
    protected $jugadores_field_subscriber;
    
    public function __construct(JugadoresFieldSubscriber $jugadores_field_subscriber) {
        $this->jugadores_field_subscriber = $jugadores_field_subscriber;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //EVENTO
            ->addEventSubscriber($this->jugadores_field_subscriber)        
            //CAMPOS    
            ->add('nombre',  null, array(
            'label'         => 'Nombre'
            ))
            ->add('telefono',  null, array(
            'label'         => 'Teléfono',
            'attr'          => ['class' => 'telefono'],
            ))            
            ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'            => 'LaLigaBundle\Entity\Club',
        ));
    }
}
