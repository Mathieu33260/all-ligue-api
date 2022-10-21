<?php

namespace App\DTO\Event;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Team;
use Symfony\Component\Serializer\Annotation\Groups;

class EventListOutput
{
    #[Groups(['event:collection:get'])]
    public int $id;

    #[Groups(['event:collection:get'])]
    public string $type;

    #[Groups(['event:collection:get'])]
    public string $detail;

    #[Groups(['event:collection:get'])]
    public int $elapsed;

    #[Groups(['event:collection:get'])]
    public ?int $elapsedExtra;

    #[Groups(['event:collection:get'])]
    public Game $game;

    #[Groups(['event:collection:get'])]
    public ?Player $player;

    #[Groups(['event:collection:get'])]
    public ?Player $playerAssist;

    #[Groups(['event:collection:get'])]
    public ?Team $team;
}
