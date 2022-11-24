<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//ajout du use pour utiliser le type input password de Symfony
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UtilisateurType extends AbstractType
{
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
                $builder
                        ->add('username')
                        // suppression du role qui sera défini par défaut
                        ->add('password', PasswordType::class)
                ;
        }

        public function configureOptions(OptionsResolver $resolver)
        {
                $resolver->setDefaults([
                'data_class' => Utilisateur::class,
                ]);
        }
}