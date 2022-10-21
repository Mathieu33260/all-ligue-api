<?php

namespace App\DataTransformer\Game;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Game\GameGetOutput;
use App\Entity\Game;

class GameGetOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Game $game
     */
    public function transform($game, string $to, array $context = []): GameGetOutput
    {
        $gameGetOutput = new GameGetOutput();
        $gameGetOutput->id = $game->getId();
        $gameGetOutput->status = $game->getStatus();
        $gameGetOutput->apiId = $game->getApiId();
        $gameGetOutput->elapsed = $game->getElapsed();
        $gameGetOutput->statusCode = $game->getStatusCode();
        $gameGetOutput->date = $game->getDate();
        $gameGetOutput->goalsAwayteam = $game->getGoalsAwayteam();
        $gameGetOutput->goalsHometeam = $game->getGoalsHometeam();
        $gameGetOutput->referee = $game->getReferee();

        $gameGetOutput->league = $game->getLeague();
        $gameGetOutput->round = $game->getRound();
        $gameGetOutput->hometeam = $game->getHometeam();
        $gameGetOutput->awayteam = $game->getAwayteam();
        $gameGetOutput->stadium = $game->getStadium();

        $gameGetOutput->lineups = $game->getLineups();
        $gameGetOutput->events = $game->getEvents();
        $gameGetOutput->gameStats = $game->getGameStats();

        return $gameGetOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('item' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Game && $to === GameGetOutput::class && 'get' === $context['item_operation_name'];
    }
}
