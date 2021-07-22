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
            ->add('search', TextType::class, ['required' => false])
            ->add('diet', ChoiceType::class, ['required' => false,
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
                    $this->translator->trans('GlutenFreeDiet') => 'GlutenFreeDiet', //Doublon déja dans les allergenes
                    $this->translator->trans('HalalDiet') => 'HalalDiet',
                    $this->translator->trans('HinduDiet') => 'HinduDiet',
                    $this->translator->trans('KosherDiet') => 'KosherDiet',
                    //'LowCalorieDiet)' => '/'''LowCalorieDiet',
                    //'LowFatDiet)' => '/'''LowFatDiet',
                    $this->translator->trans('LowLactoseDiet') => 'LowLactoseDiet', //Doublon déja dans les allergenes
                    //'LowSaltDiet)' => '/'''LowSaltDiet',
                    $this->translator->trans('VeganDiet') => 'VeganDiet',
                    $this->translator->trans('VegetarianDiet') => 'VegetarianDiet',
                    $this->translator->trans('NoPork') => 'NoPork',
                    $this->translator->trans('AlcoholFree') => 'AlcoholFree',
                ],
                'multiple' => true])
            ->add('allergy', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    $this->translator->trans('peanut') => 'peanut',
                    $this->translator->trans('celery') => 'celery',
                     $this->translator->trans('shellfish') => 'shellfish',
                    $this->translator->trans('nut') => 'nut',
                    $this->translator->trans('gluten') => 'gluten',
                    $this->translator->trans('lactose') => 'lactose',
                    $this->translator->trans('lupine') => 'lupine',
                    $this->translator->trans('mollusc') => 'mollusc',
                    $this->translator->trans('mustard') => 'mustard',
                    $this->translator->trans('egg') => 'egg',
                    $this->translator->trans('fish') => 'fish',
                    $this->translator->trans('sesame') => 'sesame',
                    $this->translator->trans('soy') => 'soy',
                    $this->translator->trans('sulphites') => 'sulphites',
                ],
                'multiple' => true
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
}