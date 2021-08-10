<?php

namespace App\EntityListener;

use App\Entity\Restaurant;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class RestaurantEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Restaurant $conference, LifecycleEventArgs $event)
    {
        $conference->computeSlug($this->slugger);
    }

    public function preUpdate(Restaurant $conference, LifecycleEventArgs $event)
    {
        $conference->computeSlug($this->slugger);
    }

    
}