<?php

namespace UserStoriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use UserStoriesBundle\Entity\Address;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option) {

        $builder
                ->add('City')
                ->add('Street')
                ->add('HouseNumber')
                ->add('Apartments')
                ->add('Zapisz', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Address::class,
        ));
    }

}
