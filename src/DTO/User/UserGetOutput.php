<?php

namespace App\DTO\User;

use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class UserGetOutput
{
    #[Groups(['user:item:get'])]
    public int $id;

    #[Groups(['user:item:get'])]
    public string $email;

    #[Groups(['user:item:get'])]
    public ?string $firstName;

    #[Groups(['user:item:get'])]
    public ?string $lastName;

    #[Groups(['user:item:get'])]
    public ?string $userName;

    #[Groups(['user:item:get'])]
    public ?Team $favoriteTeam;
}
