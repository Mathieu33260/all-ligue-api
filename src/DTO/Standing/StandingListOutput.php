<?php

namespace App\DTO\Standing;

use App\Entity\League;
use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class StandingListOutput
{
    #[Groups(['standing:collection:get'])]
    public int $id;

    #[Groups(['standing:collection:get'])]
    public int $points;

    #[Groups(['standing:collection:get'])]
    public int $goalsDiff;

    #[Groups(['standing:collection:get'])]
    public int $rank;

    #[Groups(['standing:collection:get'])]
    public string $status;

    #[Groups(['standing:collection:get'])]
    public ?string $description;

    #[Groups(['standing:collection:get'])]
    public string $form;

    #[Groups(['standing:collection:get'])]
    public int $matchsPlayed;

    #[Groups(['standing:collection:get'])]
    public int $wins;

    #[Groups(['standing:collection:get'])]
    public int $loses;

    #[Groups(['standing:collection:get'])]
    public int $draws;

    #[Groups(['standing:collection:get'])]
    public int $goalsFor;

    #[Groups(['standing:collection:get'])]
    public int $goalsAgainst;

    #[Groups(['standing:collection:get'])]
    public Team $team;

    #[Groups(['standing:collection:get'])]
    public League $league;
}
