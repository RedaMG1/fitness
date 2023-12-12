<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\Date;

;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('admin@exemple.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user->setUsername('JimmyMG');
        $user->setFirstName('Jimmy');
        $user->setLastName('MG');
        $user->setAge(21);
        
        $manager->persist($user);
        $manager->flush();
    }
}
