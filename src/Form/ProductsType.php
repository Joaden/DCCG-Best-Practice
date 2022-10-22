<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('ref')
            ->add('ean')
            ->add('slug')
            ->add('qte')
            ->add('qteLogistic')
            ->add('isValid')
            ->add('isShow')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('type')
            ->add('supplier')
            ->add('transportCode')
            ->add('description')
            ->add('price')
            ->add('sold')
            ->add('createdAt')
            ->add('categories')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
