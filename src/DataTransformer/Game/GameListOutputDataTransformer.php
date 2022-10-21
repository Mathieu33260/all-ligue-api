<?php

namespace App\DataTransformer\Game;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Game\GameListOutput;
use App\Entity\Game;

class GameListOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Game $game
     */
    public function transform($game, string $to, array $context = []): GameListOutput
    {
        $gameListOutput = new GameListOutput();
        $gameListOutput->id = $game->getId();
        $gameListOutput->status = $game->getStatus();
        $gameListOutput->apiId = $game->getApiId();
        $gameListOutput->elapsed = $game->getElapsed();
        $gameListOutput->statusCode = $game->getStatusCode();
        $gameListOutput->date = $game->getDate();
        $gameListOutput->goalsAwayteam = $game->getGoalsAwayteam();
        $gameListOutput->goalsHometeam = $game->getGoalsHometeam();
        $gameListOutput->referee = $game->getReferee();

        $gameListOutput->league = $game->getLeague();
        $gameListOutput->round = $game->getRound();
        $gameListOutput->hometeam = $game->getHometeam();
        $gameListOutput->awayteam = $game->getAwayteam();
        $gameListOutput->stadium = $game->getStadium();

        return $gameListOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('collection' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Game && $to === GameListOutput::class && 'get' === $context['collection_operation_name'];
    }
}
