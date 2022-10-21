<?php

namespace App\DTO\Lineup;

use App\Entity\Game;
use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class LineupListOutput
{
    #[Groups(['lineup:collection:get'])]
    public int $id;

    #[Groups(['lineup:collection:get'])]
    public string $formation;

    #[Groups(['lineup:collection:get'])]
    public Game $game;

    #[Groups(['lineup:collection:get'])]
    public Team $team;
}
