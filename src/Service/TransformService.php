<?php
declare(strict_types=1);

namespace App\Service;


use App\DTO\Output\MenuItemOutput;
use App\DTO\Output\MenuOutput;
use App\DTO\Output\MenuSectionOutput;
use App\Entity\Menu;
use App\Entity\MenuHasMenuSection;
use App\Entity\MenuSection;

class TransformService
{
    public function menuEntity2MenuOutput(Menu $menu, array $allergies, array $diets): MenuOutput {
        $menuOut = new MenuOutput();

        $menuOut->id = $menu->getId();
        $menuOut->name = $menu->getName();
        $menuOut->urlSlug = $menu->getUrlSlug();

        $menuHasMenuSections = $menu->getMenuHasMenuSections()->toArray();

        $menuOut->menuSections = $this->transformMenuSectionOrdered($menuHasMenuSections, null, $allergies, $diets);

        return $menuOut;
    }

    private function transformMenuSectionOrdered($menuHasMenuSections, ?int $sectionParentId, $allergies = [], $diets = []) {

        $menuHasMenuSectionFilter = array_filter($menuHasMenuSections, static function ($hasMenuSection) use ($sectionParentId) {
            $menuSectionParent = $hasMenuSection->getMenuSectionParent();
            $parent_id = null;
            if ($menuSectionParent !== null) {
                $parent_id = $menuSectionParent->getId();
            }

            return $parent_id === $sectionParentId;
        });

        usort($menuHasMenuSectionFilter, static function ($a, $b) {
            /** @var MenuHasMenuSection $a */
            /** @var MenuHasMenuSection $b */
            return ($a->getPosition() < $b->getPosition()) ? -1 : 1;
        });

        $sections = array_map(function ($menuHasMenuSection) use ($menuHasMenuSections, $allergies, $diets) {
            /** @var MenuSection $menuSec */
            $menuSec = $menuHasMenuSection->getMenuSection();

            $menuSectionOutput = new MenuSectionOutput();
            $menuSectionOutput->id = $menuSec->getId();
            $menuSectionOutput->name = $menuSec->getName();
            $menuSectionOutput->description = $menuSec->getDescription();
            $menuSectionOutput->price = $menuSec->getPrice();
            $menuSectionOutput->displayCurrencySymbolOnTitle = $menuSec->getDisplayCurrencySymbolOnTitle();
            $menuSectionOutput->displayCurrencySymbolOnChildren = $menuSec->getDisplayCurrencySymbolOnChildren();
            $menuSectionOutput->displayDescriptionAfterChildren = $menuSec->getDisplayDescriptionAfterChildren();
            $menuSectionOutput->displayChildrenSectionAfterMenuItems = $menuSec->isDisplayChildrenSectionAfterMenuItems();

            foreach ($menuSec->getHasMenuItem() as $menuItemEntity) {
                $menuItemOut = new MenuItemOutput();
                $menuItemOut->id = $menuItemEntity->getId();
                $menuItemOut->name = $menuItemEntity->getName();
                $menuItemOut->description = $menuItemEntity->getDescription();
                $menuItemOut->price = $menuItemEntity->getPrice();

                $menuItemOut->allergens = $allergies[$menuItemEntity->getId()] ?? [];
                $menuItemOut->diets = $diets[$menuItemEntity->getId()] ?? [];
                $menuItemOut->labels = [];

                $menuSectionOutput->hasMenuItem[] = $menuItemOut;
            }

            $menuSectionOutput->menuSections = $this->transformMenuSectionOrdered($menuHasMenuSections, $menuSec->getId());

            return $menuSectionOutput;
        }, $menuHasMenuSectionFilter);

        return $sections;
    }
}