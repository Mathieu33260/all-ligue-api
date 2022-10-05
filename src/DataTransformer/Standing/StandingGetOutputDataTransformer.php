<?php

namespace App\DataTransformer\Standing;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Standing\StandingGetOutput;
use App\Entity\Standing;

class StandingGetOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Standing $standing
     */
    public function transform($standing, string $to, array $context = []): StandingGetOutput
    {
        $standingGetOutput = new StandingGetOutput();
        $standingGetOutput->id = $standing->getId();
        $standingGetOutput->status = $standing->getStatus();
        $standingGetOutput->draws = $standing->getDraws();
        $standingGetOutput->wins = $standing->getWins();
        $standingGetOutput->loses = $standing->getLoses();
        $standingGetOutput->description = $standing->getDescription();
        $standingGetOutput->form = $standing->getForm();
        $standingGetOutput->goalsDiff = $standing->getGoalsDiff();
        $standingGetOutput->goalsAgainst = $standing->getGoalsAgainst();
        $standingGetOutput->goalsFor = $standing->getGoalsFor();
        $standingGetOutput->matchsPlayed = $standing->getMatchsPlayed();
        $standingGetOutput->rank = $standing->getRank();

        $standingGetOutput->team = $standing->getTeam();
        $standingGetOutput->league = $standing->getLeague();

        return $standingGetOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('item' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Standing && $to === StandingGetOutput::class && 'get' === $context['item_operation_name'];
    }
}
