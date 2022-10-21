<?php

namespace App\DTO\Game;

use App\Entity\League;
use App\Entity\Round;
use App\Entity\Stadium;
use App\Entity\Team;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

class GameGetOutput
{
    #[Groups(['game:item:get'])]
    public int $id;

    #[Groups(['game:item:get'])]
    public int $apiId;

    #[Groups(['game:item:get'])]
    public DateTimeImmutable $date;

    #[Groups(['game:item:get'])]
    public string $status;

    #[Groups(['game:item:get'])]
    public string $statusCode;

    #[Groups(['game:item:get'])]
    public ?int $elapsed;

    #[Groups(['game:item:get'])]
    public ?string $referee;

    #[Groups(['game:item:get'])]
    public ?Stadium $stadium;

    #[Groups(['game:item:get'])]
    public League $league;

    #[Groups(['game:item:get'])]
    public Team $hometeam;

    #[Groups(['game:item:get'])]
    public Team $awayteam;

    #[Groups(['game:item:get'])]
    public Round $round;

    #[Groups(['game:item:get'])]
    public ?int $goalsHometeam;

    #[Groups(['game:item:get'])]
    public ?int $goalsAwayteam;

    #[Groups(['game:item:get'])]
    public Collection $lineups;

    #[Groups(['game:item:get'])]
    public Collection $gameStats;

    #[Groups(['game:item:get'])]
    public Collection $events;
}
