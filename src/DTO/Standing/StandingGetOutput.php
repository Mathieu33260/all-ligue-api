<?php

namespace App\DTO\Standing;

use App\Entity\League;
use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class StandingGetOutput
{
    #[Groups(['standing:item:get'])]
    public int $id;

    #[Groups(['standing:item:get'])]
    public int $points;

    #[Groups(['standing:item:get'])]
    public int $goalsDiff;

    #[Groups(['standing:item:get'])]
    public int $rank;

    #[Groups(['standing:item:get'])]
    public string $status;

    #[Groups(['standing:item:get'])]
    public ?string $description;

    #[Groups(['standing:item:get'])]
    public string $form;

    #[Groups(['standing:item:get'])]
    public int $matchsPlayed;

    #[Groups(['standing:item:get'])]
    public int $wins;

    #[Groups(['standing:item:get'])]
    public int $loses;

    #[Groups(['standing:item:get'])]
    public int $draws;

    #[Groups(['standing:item:get'])]
    public int $goalsFor;

    #[Groups(['standing:item:get'])]
    public int $goalsAgainst;

    #[Groups(['standing:item:get'])]
    public Team $team;

    #[Groups(['standing:item:get'])]
    public League $league;
}
