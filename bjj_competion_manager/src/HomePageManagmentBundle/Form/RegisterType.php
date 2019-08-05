<?php


namespace HomePageManagmentBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use HomePageManagmentBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod("POST")
            ->add("email", EmailType::class)
            ->add("login", TextType::class)
            ->add("password",TextType::class )
            ->add('termsAccepted', CheckboxType::class, [
                'mapped' => false,
            ])
            ->add('save', SubmitType::class, ['label' => "Register"]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}