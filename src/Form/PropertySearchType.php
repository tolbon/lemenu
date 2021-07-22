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
                    'GlutenFreeDiet' => $this->translator->trans('GlutenFreeDiet'), //Doublon déja dans les allergenes
                    'HalalDiet' => $this->translator->trans('HalalDiet'),
                    'HinduDiet' => $this->translator->trans('HinduDiet'),
                    'KosherDiet' => $this->translator->trans('KosherDiet'),
                    //'LowCalorieDiet' => 'LowCalorieDiet',
                    //'LowFatDiet' => 'LowFatDiet',
                    'LowLactoseDiet' => $this->translator->trans('LowLactoseDiet'), //Doublon déja dans les allergenes
                    //'LowSaltDiet' => 'LowSaltDiet',
                    'VeganDiet' => $this->translator->trans('VeganDiet'),
                    'VegetarianDiet' => $this->translator->trans('VegetarianDiet'),
                    'NoPork' => $this->translator->trans('No Pork'),
                    'AlcoholFree' => $this->translator->trans('no Alcohol'),
                ],
                'multiple' => true])
            ->add('allergy', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'peanut' => $this->translator->trans('peanut'),
                    'celery' => $this->translator->trans('celery'),
                    'shellfish' =>  $this->translator->trans('shellfish'),
                    'nut' => $this->translator->trans('nut'),
                    'gluten' => $this->translator->trans('gluten'),
                    'lactose' => $this->translator->trans('lactose'),
                    'lupine' => $this->translator->trans('lupine'),
                    'mollusc' => $this->translator->trans('mollusc'),
                    'mustard' => $this->translator->trans('mustard'),
                    'egg' => $this->translator->trans('egg'),
                    'fish' => $this->translator->trans('fish'),
                    'sesame' => $this->translator->trans('sesame'),
                    'soy' => $this->translator->trans('soy'),
                    'sulphites' => $this->translator->trans('sulphites')
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