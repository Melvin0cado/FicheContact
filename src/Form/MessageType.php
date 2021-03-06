<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('departement', ChoiceType::class, [
                'choices' => [
                    'Direction' => 'Direction',
                    'Comptable' => 'Comptable',
                    'Ressources Humaines' => 'Ressources Humaines',
                    'Marketing' => 'Marketing',
                    'Communication' => 'Communication',
                    'Développeur' => 'Developpeur',
                    ]
            ])
            ->add('message')
            ->add('mail')
        ;
    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
