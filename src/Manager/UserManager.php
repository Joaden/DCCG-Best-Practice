<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class UserManager
{
    private $passwordHasher;
    private $entityManager;
    private $params;

    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, ParameterBagInterface $params)
    {
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
        $this->params = $params;
    }

    /**
     * Add new user
     * @return User
     */
    function createNewUser(User $user, string $plainPassword)
    {
        $user = $this->addPassword($user, $plainPassword);

        $user->setRoles['ROLE_USER'];
        $this->saveCreateUser($user);

        return $user;
    }

    /**
     * Flush new user
     */
    function saveCreateUser(User $user)
    {

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * Flush new user
     */
    function saveDateLastLog(User $user)
    {
        $user->setDateLastLog(new DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

}