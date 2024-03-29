<?php

namespace App\Form;

use App\Entity\Sejours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Sejours1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('prix')
            ->add('langue')
            ->add('age')
            ->add('pays')
            ->add('start_date')
            ->add('end_date')
            ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sejours::class,
        ]);
    }
}
