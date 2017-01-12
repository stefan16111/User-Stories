<?php

namespace UserStoriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use UserStoriesBundle\Entity\User;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $option) {
        
        $builder
            ->add('Name')
            ->add('Surname')
            ->add('Description')
        ;
    }
    
public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => User::class,
    ));
}
}

