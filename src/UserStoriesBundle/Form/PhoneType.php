<?php

namespace UserStoriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use UserStoriesBundle\Entity\Phone;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhoneType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option) {

        $builder
                ->add('phoneNumber')
                ->add('type')
                ->add('Zapisz', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Phone::class,
        ));
    }

}
