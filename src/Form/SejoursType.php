<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Sejours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SejoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('titre')
            ->add('start_date')
            ->add('end_date')
            ->add('prix')
            ->add('langue')
            ->add('age')
            ->add('pays')
            ->add('categorie',EntityType::class, ['class' => Categorie::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sejours::class,
        ]);
    }
}
