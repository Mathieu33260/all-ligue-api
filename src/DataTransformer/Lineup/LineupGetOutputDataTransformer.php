<?php

namespace App\DataTransformer\Lineup;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Lineup\LineupGetOutput;
use App\Entity\Lineup;

class LineupGetOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Lineup $lineup
     */
    public function transform($lineup, string $to, array $context = []): LineupGetOutput
    {
        $lineupGetOutput = new LineupGetOutput();
        $lineupGetOutput->id = $lineup->getId();
        $lineupGetOutput->formation = $lineup->getFormation();

        $lineupGetOutput->game = $lineup->getGame();
        $lineupGetOutput->team = $lineup->getTeam();

        $lineupGetOutput->playerPositions = $lineup->getPlayerPositions();

        return $lineupGetOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('item' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Lineup && $to === LineupGetOutput::class && 'get' === $context['item_operation_name'];
    }
}
