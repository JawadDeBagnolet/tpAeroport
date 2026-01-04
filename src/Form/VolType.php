<?php

namespace App\Form;

use App\Entity\Vol;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('destination', TextType::class,[
                'label'=>'Destination'
            ])
            ->add('heureDepart', DateTimeType::class,[
                'label'=>'Heure depart'
            ])
            ->add('heureArrivee',DateTimeType::class,[
                'label'=>'Heure depart'
            ])
            ->add('prix', MoneyType::class,[
                'label'=>'Prix'
            ])
            ->add('save', SubmitType::class,[
                'label'=>'Ajouter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vol::class,
        ]);
    }
}
