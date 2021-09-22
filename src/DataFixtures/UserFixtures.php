<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

     public function __construct(UserPasswordHasherInterface $passwordHasher)
     {
         $this->passwordHasher = $passwordHasher;
     }
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('jb@lemenu.com');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'jb'
                    ));
        $user->setRoles(['ROLE_USER']);
        $user->setIsVerified(true);

        $manager->persist($user);

        $manager->flush();
    }
}
