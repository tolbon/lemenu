<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public const USER_REFERENCE = 'the_simple_user';
    public const MANAGER_ROSAPARKS = 'manager_rosaparks';
    public const MANAGER_BOSPHORE = 'manager_bosphore';

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('test@test.com');
        $user->setPassword($this->passwordHasher->hashPassword(
            $user,
            'test'
                    ));
        $user->setRoles(['ROLE_USER']);
        $user->setIsVerified(true);

        $this->addReference(self::USER_REFERENCE, $user);

        $user2 = new User();
        $user2->setEmail('jb@rosapark.com');
        $user2->setPassword($this->passwordHasher->hashPassword(
            $user2,
            'jb'
        ));
        $user2->setRoles(['ROLE_RESTAURATEUR', 'ROLE_USER']);
        $user2->setIsVerified(true);
        $this->addReference(self::MANAGER_ROSAPARKS, $user2);

        $user3 = new User();
        $user3->setEmail('jb@bosphore.com');
        $user3->setPassword($this->passwordHasher->hashPassword(
            $user3,
            'jb'
        ));
        $user3->setRoles(['ROLE_RESTAURATEUR', 'ROLE_USER']);
        $user3->setIsVerified(true);
        $this->addReference(self::MANAGER_BOSPHORE, $user3);

        $manager->persist($user);
        $manager->persist($user2);
        $manager->persist($user3);

        $manager->flush();
    }
}
