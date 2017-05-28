<?php

namespace LaLigaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class JugadoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Club',  EntityType::class, array(
                'class'         =>'LaLigaBundle:Club',
                'choice_label'  => 'nombre',
                'label'         => 'Club',
                'placeholder'   => 'Seleccione un Club'
            ))                
            ->add('nombre',  null, array(
                'label'         => 'Nombre'
            ))
            ;
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'            => 'LaLigaBundle\Entity\Jugadores',
        ));
    }
}
