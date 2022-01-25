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
        $key = 0;
        $newUser = new User();
        $newUser->setEmail('jcriotte69@gmail.com');
        $newUser->setFirstname('Jean-Christophe');
        $newUser->setLastname('RIOTTE');
        $newUser->setRoles(['ROLE_ADMIN']);
        $newUser->setFirstConnection(true);
        $plaintextPassword = ('jcriotte69');
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasder->hashPassword(
            $newUser,
            $plaintextPassword
        );
        $newUser->setPassword($hashedPassword);
        $manager->persist($newUser);
        $this->addReference('user_' . $key, $newUser);

        $manager->flush();

        $key++;
        $newUser = new User();
        $newUser->setEmail('client69@gmail.com');
        $newUser->setFirstname('Harry');
        $newUser->setLastname('SUIVANT');
        $newUser->setRoles(['']);
        $newUser->setFirstConnection(false);
        $plaintextPassword = ('client');
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasder->hashPassword(
            $newUser,
            $plaintextPassword
        );
        $newUser->setPassword($hashedPassword);
        $manager->persist($newUser);
        $this->addReference('user_' . $key, $newUser);

        $manager->flush();
    }
}
