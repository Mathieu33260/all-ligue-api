<?php

namespace App\DataTransformer\Event;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\DTO\Event\EventListOutput;
use App\Entity\Event;

class EventListOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param Event $event
     */
    public function transform($event, string $to, array $context = []): EventListOutput
    {
        $eventListOutput = new EventListOutput();
        $eventListOutput->id = $event->getId();
        $eventListOutput->elapsed = $event->getElapsed();
        $eventListOutput->elapsedExtra = $event->getElapsedExtra();
        $eventListOutput->type = $event->getType();
        $eventListOutput->detail = $event->getDetail();

        $eventListOutput->team = $event->getTeam();
        $eventListOutput->game = $event->getGame();
        $eventListOutput->player = $event->getPlayer();
        $eventListOutput->playerAssist = $event->getPlayerAssist();

        return $eventListOutput;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ('collection' !== $context['operation_type']) {
            return false;
        }

        return $data instanceof Event && $to === EventListOutput::class && 'get' === $context['collection_operation_name'];
    }
}
