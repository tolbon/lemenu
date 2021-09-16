<?php

namespace App\EntityListener;

use App\Entity\Menu;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class MenuEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Menu $menu, LifecycleEventArgs $event)
    {
        $menu->computeSlug($this->slugger);
        $menu->setInsertDateAt(new DateTimeImmutable('now', new DateTimeZone('UTC')));
    }

    public function preUpdate(Menu $menu, LifecycleEventArgs $event)
    {
        $menu->computeSlug($this->slugger);
    }   
}