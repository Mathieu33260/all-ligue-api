<?php

namespace App\DTO\User;

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

    #[Assert\NotBlank]
    public string $firstName;

    #[Assert\NotBlank]
    public string $lastName;

    /**
     * @UniqueUsername()
     */
    #[Assert\NotBlank]
    public string $userName;
}
