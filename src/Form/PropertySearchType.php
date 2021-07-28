<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Allergy;
use App\Entity\Diet;
use App\Repository\AllergyRepository;
use App\Repository\DietRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class PropertySearchType extends AbstractType
{
    private AllergyRepository $allergyRepository;
    private DietRepository $dietRepository;

    public function __construct(AllergyRepository $allergyRepository, DietRepository $dietRepository)
    {
        $this->allergyRepository = $allergyRepository;
        $this->dietRepository = $dietRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $allergies = [];
        $allergiesDb = $this->allergyRepository->findAll();
        /** @var Allergy $allergy */
        foreach($allergiesDb as $allergy) {
            $allergies[$allergy->getName()] = $allergy->getName();
        }

        $diets = [];
        $dietDb = $this->dietRepository->findAll();
        /** @var Diet $diet */
        foreach($dietDb as $diet) {
            $diets[$diet->getName()] = $diet->getName();
        }

        $builder
            ->add('search', TextType::class, [
                'label' => 'search',
                'required' => false])
            ->add('diet', ChoiceType::class, [
                'label' => 'diet',
                'required' => false,
                'choices' => $diets,
                'multiple' => true])
            ->add('allergy', ChoiceType::class, [
                'label' => 'allergy',
                'required' => false,
                'choices' => $allergies,
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