<?php
declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class PropertySearchType extends AbstractType
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', TextType::class, [
                'label' => 'search',
                'required' => false])
            ->add('diet', ChoiceType::class, [
                'label' => 'diet',
                'required' => false,
                'choices' => [
                   /* 'vegan' => '100% Vegetal',
                    'vegetarien' => 'Végétarien',
                    'gluten_free' => 'gluten free',
                    'lactose_free' => 'lactose_free',
                    'coriandre_free' => 'coriandre_free',
                    'no_porc' => 'no porc',
                    'no_alchool' => 'no alchool',
                    'Viande' => 'viande',
                    'Poisson' => 'Poisson',
                    'Legume' => 'Legume',
                    'Vege' => 'Vege',
                    */
                    //'DiabeticDiet' => 'DiabeticDiet',
                    'GlutenFreeDiet' => 'GlutenFreeDiet', //Doublon déja dans les allergenes
                    'HalalDiet' => 'HalalDiet',
                    'HinduDiet' => 'HinduDiet',
                    'KosherDiet' => 'KosherDiet',
                    //'LowCalorieDiet)' => '/'''LowCalorieDiet',
                    //'LowFatDiet)' => '/'''LowFatDiet',
                    'LowLactoseDiet' => 'LowLactoseDiet', //Doublon déja dans les allergenes
                    //'LowSaltDiet)' => '/'''LowSaltDiet',
                    'VeganDiet' => 'VeganDiet',
                    'VegetarianDiet' => 'VegetarianDiet',
                    'NoPork' => 'NoPork',
                    'AlcoholFree' => 'AlcoholFree',
                ],
                'multiple' => true])
            ->add('allergy', ChoiceType::class, [
                'label' => 'allergy',
                'required' => false,
                'choices' => [
                    'peanut' => 'peanut',
                    'celery' => 'celery',
                    'shellfish' => 'shellfish',
                    'nut' => 'nut',
                    'gluten' => 'gluten',
                    'lactose' => 'lactose',
                    'lupine' => 'lupine',
                    'mollusc' => 'mollusc',
                    'mustard' => 'mustard',
                    'egg' => 'egg',
                    'fish' => 'fish',
                    'sesame' => 'sesame',
                    'soy' => 'soy',
                    'sulphites' => 'sulphites',
                ],
                'multiple' => true,
            ])
            ->add('filter', SubmitType::class, ['label' => 'filter'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'get',
            'csrf_protection' => true
        ]);
    }
}