<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label = null;

    #[ORM\ManyToOne(inversedBy: 'days')]
    private ?Program $program = null;

    #[ORM\Column]
    private ?int $current_day = null;

    #[ORM\Column(nullable: true)]
    private ?array $workout = null;

    #[ORM\Column(nullable: true)]
    private ?float $cardio = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end = null;

    #[ORM\OneToMany(mappedBy: 'day', targetEntity: DayStart::class)]
    private Collection $dayStarts;

    public function __construct()
    {
        $this->dayStarts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): static
    {
        $this->program = $program;

        return $this;
    }

    public function getCurrentDay(): ?int
    {
        return $this->current_day;
    }

    public function setCurrentDay(int $current_day): static
    {
        $this->current_day = $current_day;

        return $this;
    }

    public function getWorkout(): ?array
    {
        return $this->workout;
    }

    public function setWorkout(?array $workout): static
    {
        $this->workout = $workout;

        return $this;
    }

    public function getCardio(): ?float
    {
        return $this->cardio;
    }

    public function setCardio(?float $cardio): static
    {
        $this->cardio = $cardio;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): static
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @return Collection<int, DayStart>
     */
    public function getDayStarts(): Collection
    {
        return $this->dayStarts;
    }

    public function addDayStart(DayStart $dayStart): static
    {
        if (!$this->dayStarts->contains($dayStart)) {
            $this->dayStarts->add($dayStart);
            $dayStart->setDay($this);
        }

        return $this;
    }

    public function removeDayStart(DayStart $dayStart): static
    {
        if ($this->dayStarts->removeElement($dayStart)) {
            // set the owning side to null (unless already changed)
            if ($dayStart->getDay() === $this) {
                $dayStart->setDay(null);
            }
        }

        return $this;
    }
}
