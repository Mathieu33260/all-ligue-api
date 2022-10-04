<?php

namespace App\DataTransformer\League;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\League\LeagueListOutput;
use App\Entity\League;

class LeagueListOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param League $league
     */
    public function transform($league, string $to, array $context = []): LeagueListOutput
    {
        $leagueListOutput = new LeagueListOutput();
        $leagueListOutput->id = $league->getId();
        $leagueListOutput->name = $league->getName();
        $leagueListOutput->apiId = $league->getApiId();
        $leagueListOutput->start = $league->getStart();
        $leagueListOutput->end = $league->getEnd();
        $leagueListOutput->type = $league->getType();
        $leagueListOutput->season = $league->getSeason();
        $leagueListOutput->country = $league->getCountry();
        $leagueListOutput->flag = $league->getFlag();
        $leagueListOutput->logo = $league->getLogo();

        return $leagueListOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('collection' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof League && $to === LeagueListOutput::class && 'get' === $context['collection_operation_name'];
    }
}
