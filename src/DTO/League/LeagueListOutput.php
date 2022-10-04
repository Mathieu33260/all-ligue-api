<?php

namespace App\DTO\League;

use DateTimeImmutable;

class LeagueListOutput
{
    public int $id;

    public int $apiId;

    public string $name;

    public string $type;

    public string $logo;

    public string $country;

    public string $flag;

    public int $season;

    public DateTimeImmutable $start;

    public DateTimeImmutable $end;
}
