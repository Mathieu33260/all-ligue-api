<?php

namespace App\DTO\User;

use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class UserListOutput
{
    #[Groups(['user:collection:get'])]
    public int $id;

    #[Groups(['user:collection:get'])]
    public string $email;

    #[Groups(['user:collection:get'])]
    public ?string $userName;

    #[Groups(['user:collection:get'])]
    public ?Team $favoriteTeam;
}
