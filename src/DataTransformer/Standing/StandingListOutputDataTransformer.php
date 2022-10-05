<?php

namespace App\DataTransformer\Standing;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Standing\StandingListOutput;
use App\Entity\Standing;

class StandingListOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Standing $standing
     */
    public function transform($standing, string $to, array $context = []): StandingListOutput
    {
        $standingListOutput = new StandingListOutput();
        $standingListOutput->id = $standing->getId();
        $standingListOutput->status = $standing->getStatus();
        $standingListOutput->draws = $standing->getDraws();
        $standingListOutput->wins = $standing->getWins();
        $standingListOutput->loses = $standing->getLoses();
        $standingListOutput->description = $standing->getDescription();
        $standingListOutput->form = $standing->getForm();
        $standingListOutput->goalsDiff = $standing->getGoalsDiff();
        $standingListOutput->goalsAgainst = $standing->getGoalsAgainst();
        $standingListOutput->goalsFor = $standing->getGoalsFor();
        $standingListOutput->matchsPlayed = $standing->getMatchsPlayed();
        $standingListOutput->rank = $standing->getRank();

        $standingListOutput->team = $standing->getTeam();
        $standingListOutput->league = $standing->getLeague();

        return $standingListOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('collection' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Standing && $to === StandingListOutput::class && 'get' === $context['collection_operation_name'];
    }
}
