<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasder;

    public function __construct(UserPasswordHasherInterface $passwordHasderInt)
    {
        $this->passwordHasder = $passwordHasderInt;
    }
    public function load(ObjectManager $manager): void
    {
        $newUser = new User();
        $newUser->setEmail('jcriotte69@gmail.com');
        $newUser->setFirstname('Jean-Christophe');
        $newUser->setLastname('RIOTTE');
        $newUser->setRoles(['ROLE_ADMIN']);
        $plaintextPassword = ('jcriotte69');
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasder->hashPassword(
            $newUser,
            $plaintextPassword
        );
        $newUser->setPassword($hashedPassword);
        $manager->persist($newUser);

        $manager->flush();

        $newUser = new User();
        $newUser->setEmail('client69@gmail.com');
        $newUser->setFirstname('Harry');
        $newUser->setLastname('SUIVANT');
        $newUser->setRoles(['']);
        $plaintextPassword = ('client');
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasder->hashPassword(
            $newUser,
            $plaintextPassword
        );
        $newUser->setPassword($hashedPassword);
        $manager->persist($newUser);

        $manager->flush();
    }
}
