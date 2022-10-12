<?php

namespace App\DTO\User;

use App\Entity\Team;
use App\Validator\User\UniqueEmail;
use App\Validator\User\UniqueUsername;
use Symfony\Component\Validator\Constraints as Assert;

class UserPostInput
{
    /**
     * @UniqueEmail()
     */
    #[Assert\Email]
    #[Assert\NotBlank]
    public string $email;

    #[Assert\NotBlank]
    public string $password;

    public ?string $firstName;

    public ?string $lastName;

    /**
     * @UniqueUsername()
     */
    public ?string $userName;

    public ?Team $favoriteTeam = null;
}
