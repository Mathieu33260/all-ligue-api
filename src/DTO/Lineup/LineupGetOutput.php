<?php

namespace App\DTO\Lineup;

use App\Entity\Game;
use App\Entity\Team;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

class LineupGetOutput
{
    #[Groups(['lineup:item:get'])]
    public int $id;

    #[Groups(['lineup:item:get'])]
    public string $formation;

    #[Groups(['lineup:item:get'])]
    public Game $game;

    #[Groups(['lineup:item:get'])]
    public Team $team;

    #[Groups(['lineup:item:get'])]
    public Collection $playerPositions;
}
