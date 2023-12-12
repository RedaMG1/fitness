<?php

namespace App\Entity;

use App\Repository\ExerciseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $muscle = null;

    #[ORM\OneToMany(mappedBy: 'exercise', targetEntity: DayStart::class)]
    private Collection $dayStarts;

    public function __construct()
    {
        $this->dayStarts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getMuscle(): ?int
    {
        return $this->muscle;
    }

    public function setMuscle(int $muscle): static
    {
        $this->muscle = $muscle;

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
            $dayStart->setExercise($this);
        }

        return $this;
    }

    public function removeDayStart(DayStart $dayStart): static
    {
        if ($this->dayStarts->removeElement($dayStart)) {
            // set the owning side to null (unless already changed)
            if ($dayStart->getExercise() === $this) {
                $dayStart->setExercise(null);
            }
        }

        return $this;
    }
}
