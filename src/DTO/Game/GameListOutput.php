<?php

namespace App\DTO\Game;

use App\Entity\League;
use App\Entity\Round;
use App\Entity\Stadium;
use App\Entity\Team;
use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\Groups;

class GameListOutput
{
    #[Groups(['game:collection:get'])]
    public int $id;

    #[Groups(['game:collection:get'])]
    public int $apiId;

    #[Groups(['game:collection:get'])]
    public DateTimeImmutable $date;

    #[Groups(['game:collection:get'])]
    public string $status;

    #[Groups(['game:collection:get'])]
    public string $statusCode;

    #[Groups(['game:collection:get'])]
    public ?int $elapsed;

    #[Groups(['game:collection:get'])]
    public ?string $referee;

    #[Groups(['game:collection:get'])]
    public ?Stadium $stadium;

    #[Groups(['game:collection:get'])]
    public League $league;

    #[Groups(['game:collection:get'])]
    public Team $hometeam;

    #[Groups(['game:collection:get'])]
    public Team $awayteam;

    #[Groups(['game:collection:get'])]
    public Round $round;

    #[Groups(['game:collection:get'])]
    public ?int $goalsHometeam;

    #[Groups(['game:collection:get'])]
    public ?int $goalsAwayteam;
}
