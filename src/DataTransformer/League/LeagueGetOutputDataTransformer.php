<?php

namespace App\DataTransformer\League;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\League\LeagueGetOutput;
use App\Entity\League;

class LeagueGetOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param League $league
     */
    public function transform($league, string $to, array $context = []): LeagueGetOutput
    {
        $leagueGetOutput = new LeagueGetOutput();
        $leagueGetOutput->id = $league->getId();
        $leagueGetOutput->name = $league->getName();
        $leagueGetOutput->apiId = $league->getApiId();
        $leagueGetOutput->start = $league->getStart();
        $leagueGetOutput->end = $league->getEnd();
        $leagueGetOutput->type = $league->getType();
        $leagueGetOutput->season = $league->getSeason();
        $leagueGetOutput->country = $league->getCountry();
        $leagueGetOutput->flag = $league->getFlag();
        $leagueGetOutput->logo = $league->getLogo();

        return $leagueGetOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('item' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof League && $to === LeagueGetOutput::class && 'get' === $context['item_operation_name'];
    }
}
