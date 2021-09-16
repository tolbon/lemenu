<?php
declare(strict_types=1);

namespace App\DTO;


use Symfony\Component\Validator\Constraints as Assert;

class FilterMenuDTO
{
    /**
     * @var string|null
     * @Assert\Type(type={"alpha", "digit"}, message="Votre nom {{ value }} doit contenir seulement {{ type }}.")
     */
    public ?string $search = null;
    /** @var string[]  */
    public array $diet = [];
    /** @var string[]  */
    public array $allergy = [];
}