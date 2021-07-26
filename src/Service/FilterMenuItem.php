<?php
declare(strict_types=1);

namespace App\Service;


use App\DTO\FilterMenuDTO;
use App\Entity\Menu;
use App\Entity\MenuItem;
use App\Entity\MenuSection;

class FilterMenuItem
{
    public const REPLACEMENT = ['!', '*', "'", '(', ')', ';', ':', '&', '=', '+', ',', '/', '?', '%', '#', '[', ']', ' '];

    public function filter(Menu $menu, FilterMenuDTO $filterMenuDTO) {
        $this->recursiveSection($menu->getHasMenuSection(), $filterMenuDTO);
    }

    private function recursiveSection($sections, FilterMenuDTO $filterMenuDTO) {
        /** @var MenuSection $section */
        foreach ($sections as $section) {
            $this->recursiveSection($section->getHasMenuSection(), $filterMenuDTO);

            $section->replaceHasMenuItem($section->getHasMenuItem()->filter(static function ($item) use ($filterMenuDTO) {
                /** @var MenuItem $item */
                foreach ($item->getAllergens() as $menuItemTag) {
                    if (in_array($menuItemTag->getName(), $filterMenuDTO->allergy, true) === true) {
                        return false;
                    }
                }

                //FIXME les preference alimentaire accepte ou non certain aliments sans gluten je ne veux pas de gluten mais Hallal je veux que la viande abbatu hallal
                /** @var MenuItem $item */
                foreach ($item->getDiets() as $menuItemTag) {
                    if (in_array($menuItemTag->getName(), $filterMenuDTO->diet, true) === true) {
                        return true;
                    }
                }

                return true;
            }));
        }

    }
}