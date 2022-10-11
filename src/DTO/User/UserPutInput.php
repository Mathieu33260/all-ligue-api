<?php

namespace App\DTO\User;

use App\Entity\Team;
use Symfony\Component\Validator\Constraints as Assert;

class UserPutInput
{
    /**
     * @Assert\NotBlank
     */
    public ?string $firstName;

    /**
     * @Assert\NotBlank
     */
    public ?string $lastName;

    public ?Team $favoriteTeam;
}
