<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeamRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?int $apiId = null;

    #[ORM\Column(length: 255)]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?string $country = null;

    #[ORM\Column]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?int $founded = null;

    #[ORM\Column(length: 255)]
    #[Groups(['standing:item:get', 'standing:collection:get'])]
    private ?string $logo = null;

    #[ORM\OneToOne(mappedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Stadium $stadium = null;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Player::class)]
    private Collection $players;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Standing::class)]
    private Collection $standings;

    #[ORM\OneToMany(mappedBy: 'hometeam', targetEntity: Game::class)]
    private Collection $gamesHome;

    #[ORM\OneToMany(mappedBy: 'awayteam', targetEntity: Game::class)]
    private Collection $gamesAway;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Lineup::class)]
    private Collection $lineups;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: GameStat::class)]
    private Collection $gameStats;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: TeamStat::class)]
    private Collection $teamStats;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Event::class)]
    private Collection $events;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: PlayerStat::class)]
    private Collection $playerStats;

    #[ORM\OneToMany(mappedBy: 'favoriteTeam', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->standings = new ArrayCollection();
        $this->gamesHome = new ArrayCollection();
        $this->gamesAway = new ArrayCollection();
        $this->lineups = new ArrayCollection();
        $this->gameStats = new ArrayCollection();
        $this->teamStats = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->playerStats = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApiId(): ?int
    {
        return $this->apiId;
    }

    public function setApiId(int $apiId): self
    {
        $this->apiId = $apiId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getFounded(): ?int
    {
        return $this->founded;
    }

    public function setFounded(int $founded): self
    {
        $this->founded = $founded;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getStadium(): ?Stadium
    {
        return $this->stadium;
    }

    public function setStadium(?Stadium $stadium): self
    {
        // unset the owning side of the relation if necessary
        if ($stadium === null && $this->stadium !== null) {
            $this->stadium->setTeam(null);
        }

        // set the owning side of the relation if necessary
        if ($stadium !== null && $stadium->getTeam() !== $this) {
            $stadium->setTeam($this);
        }

        $this->stadium = $stadium;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Standing>
     */
    public function getStandings(): Collection
    {
        return $this->standings;
    }

    public function addStanding(Standing $standing): self
    {
        if (!$this->standings->contains($standing)) {
            $this->standings->add($standing);
            $standing->setTeam($this);
        }

        return $this;
    }

    public function removeStanding(Standing $standing): self
    {
        if ($this->standings->removeElement($standing)) {
            // set the owning side to null (unless already changed)
            if ($standing->getTeam() === $this) {
                $standing->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGamesHome(): Collection
    {
        return $this->gamesHome;
    }

    public function addGameHome(Game $gameHome): self
    {
        if (!$this->gamesHome->contains($gameHome)) {
            $this->gamesHome->add($gameHome);
            $gameHome->setHometeam($this);
        }

        return $this;
    }

    public function removeGameHome(Game $gameHome): self
    {
        if ($this->gamesHome->removeElement($gameHome)) {
            // set the owning side to null (unless already changed)
            if ($gameHome->getHometeam() === $this) {
                $gameHome->setHometeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGamesAway(): Collection
    {
        return $this->gamesAway;
    }

    public function addGameAway(Game $gameAway): self
    {
        if (!$this->gamesAway->contains($gameAway)) {
            $this->gamesAway->add($gameAway);
            $gameAway->setAwayteam($this);
        }

        return $this;
    }

    public function removeGameAway(Game $gameAway): self
    {
        if ($this->gamesAway->removeElement($gameAway)) {
            // set the owning side to null (unless already changed)
            if ($gameAway->getAwayteam() === $this) {
                $gameAway->setAwayteam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lineup>
     */
    public function getLineups(): Collection
    {
        return $this->lineups;
    }

    public function addLineup(Lineup $lineup): self
    {
        if (!$this->lineups->contains($lineup)) {
            $this->lineups->add($lineup);
            $lineup->setTeam($this);
        }

        return $this;
    }

    public function removeLineup(Lineup $lineup): self
    {
        if ($this->lineups->removeElement($lineup)) {
            // set the owning side to null (unless already changed)
            if ($lineup->getTeam() === $this) {
                $lineup->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GameStat>
     */
    public function getGameStats(): Collection
    {
        return $this->gameStats;
    }

    public function addGameStat(GameStat $gameStat): self
    {
        if (!$this->gameStats->contains($gameStat)) {
            $this->gameStats->add($gameStat);
            $gameStat->setTeam($this);
        }

        return $this;
    }

    public function removeGameStat(GameStat $gameStat): self
    {
        if ($this->gameStats->removeElement($gameStat)) {
            // set the owning side to null (unless already changed)
            if ($gameStat->getTeam() === $this) {
                $gameStat->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TeamStat>
     */
    public function getTeamStats(): Collection
    {
        return $this->teamStats;
    }

    public function addTeamStat(TeamStat $teamStat): self
    {
        if (!$this->teamStats->contains($teamStat)) {
            $this->teamStats->add($teamStat);
            $teamStat->setTeam($this);
        }

        return $this;
    }

    public function removeTeamStat(TeamStat $teamStat): self
    {
        if ($this->teamStats->removeElement($teamStat)) {
            // set the owning side to null (unless already changed)
            if ($teamStat->getTeam() === $this) {
                $teamStat->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setTeam($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getTeam() === $this) {
                $event->setTeam(null);
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

    /**
     * @return Collection<int, PlayerStat>
     */
    public function getPlayerStats(): Collection
    {
        return $this->playerStats;
    }

    public function addPlayerStat(PlayerStat $playerStat): self
    {
        if (!$this->playerStats->contains($playerStat)) {
            $this->playerStats->add($playerStat);
            $playerStat->setTeam($this);
        }

        return $this;
    }

    public function removePlayerStat(PlayerStat $playerStat): self
    {
        if ($this->playerStats->removeElement($playerStat)) {
            // set the owning side to null (unless already changed)
            if ($playerStat->getTeam() === $this) {
                $playerStat->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setFavoriteTeam($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getFavoriteTeam() === $this) {
                $user->setFavoriteTeam(null);
            }
        }

        return $this;
    }
}
