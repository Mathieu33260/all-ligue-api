<?php

namespace App\DataTransformer\Lineup;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Lineup\LineupListOutput;
use App\Entity\Lineup;

class LineupListOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Lineup $lineup
     */
    public function transform($lineup, string $to, array $context = []): LineupListOutput
    {
        $lineupListOutput = new LineupListOutput();
        $lineupListOutput->id = $lineup->getId();
        $lineupListOutput->formation = $lineup->getFormation();

        $lineupListOutput->game = $lineup->getGame();
        $lineupListOutput->team = $lineup->getTeam();


        return $lineupListOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('collection' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Lineup && $to === LineupListOutput::class && 'get' === $context['collection_operation_name'];
    }
}
