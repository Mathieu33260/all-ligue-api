<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\DTO\Game\GameGetOutput;
use App\DTO\Game\GameListOutput;
use App\DTO\Lineup\LineupGetOutput;
use App\DTO\Lineup\LineupListOutput;
use App\Repository\LineupRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LineupRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'method' => 'GET',
            'output' => LineupListOutput::class,
            'normalization_context' => ['groups' => ['lineup:collection:get']],
        ],
    ],
    itemOperations: [
        'get' => [
            'method' => 'GET',
            'output' => LineupGetOutput::class,
            'normalization_context' => ['groups' => ['lineup:item:get']],
        ],
    ]
)]
class Lineup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $formation = null;

    #[ORM\ManyToOne(inversedBy: 'lineups')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    #[ORM\ManyToOne(inversedBy: 'lineups')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team = null;

    #[ORM\OneToMany(mappedBy: 'lineup', targetEntity: PlayerPosition::class)]
    #[Groups(['lineup:item:get'])]
    private Collection $playerPositions;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->playerPositions = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Collection<int, PlayerPosition>
     */
    public function getPlayerPositions(): Collection
    {
        return $this->playerPositions;
    }

    public function addPlayerPosition(PlayerPosition $playerPosition): self
    {
        if (!$this->playerPositions->contains($playerPosition)) {
            $this->playerPositions->add($playerPosition);
            $playerPosition->setLineup($this);
        }

        return $this;
    }

    public function removePlayerPosition(PlayerPosition $playerPosition): self
    {
        if ($this->playerPositions->removeElement($playerPosition)) {
            // set the owning side to null (unless already changed)
            if ($playerPosition->getLineup() === $this) {
                $playerPosition->setLineup(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
