<?php

namespace UserStoriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use UserStoriesBundle\Entity\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option) {

        $builder
                ->add('emailAddress')
                ->add('type')
                ->add('Zapisz', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Email::class,
        ));
    }

}
