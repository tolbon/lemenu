<?php
declare(strict_types=1);

namespace App\Service;


use App\DTO\FilterMenuDTO;
use App\DTO\Output\MenuItemOutput;
use App\DTO\Output\MenuOutput;
use App\DTO\Output\MenuSectionOutput;

class FilterMenuItem
{
    public const REPLACEMENT = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', ',', '/', '?', '%', '#', '[', ']', ' '];

    public function filter(MenuOutput $menu, FilterMenuDTO $filterMenuDTO) {
        $this->recursiveSection($menu->menuSections, $filterMenuDTO);
    }

    /**
     * @param MenuSectionOutput[] $sections
     * @param FilterMenuDTO $filterMenuDTO
     */
    private function recursiveSection(array $sections, FilterMenuDTO $filterMenuDTO) {

        foreach ($sections as $section) {
            $this->recursiveSection($section->menuSections, $filterMenuDTO);

            $section->hasMenuItem = array_filter($section->hasMenuItem, static function ($item) use ($filterMenuDTO) {
                /** @var MenuItemOutput $item */
                foreach ($item->allergens as $menuItemAllergen) {
                    if (in_array($menuItemAllergen->getName(), $filterMenuDTO->allergy, true) === true) {
                        return false;
                    }
                }

                //FIXME les preference alimentaire accepte ou non certain aliments sans gluten je ne veux pas de gluten mais Hallal je veux que la viande abbatu hallal
                /** @var MenuItemOutput $item */
                foreach ($item->diets as $menuItemDiet) {
                    if (in_array($menuItemDiet->getName(), $filterMenuDTO->diet, true) === true) {
                        return true;
                    }
                }

                return true;
            });
        }

    }
}