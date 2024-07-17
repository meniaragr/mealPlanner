<?php

namespace App\Entity;

use App\Repository\PlannerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlannerRepository::class)]
class Planner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'planner', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    /**
     * @var Collection<int, Week>
     */
    #[ORM\ManyToMany(targetEntity: Week::class)]
    private Collection $day;

    /**
     * @var Collection<int, Recipe>
     */
    #[ORM\ManyToMany(targetEntity: Recipe::class)]
    private Collection $recipe;

    /**
     * @var Collection<int, Time>
     */
    #[ORM\ManyToMany(targetEntity: Time::class)]
    private Collection $time;

    public function __construct()
    {
        $this->day = new ArrayCollection();
        $this->recipe = new ArrayCollection();
        $this->time = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Week>
     */
    public function getDay(): Collection
    {
        return $this->day;
    }

    public function addDay(Week $day): static
    {
        if (!$this->day->contains($day)) {
            $this->day->add($day);
        }

        return $this;
    }

    public function removeDay(Week $day): static
    {
        $this->day->removeElement($day);

        return $this;
    }

    /**
     * @return Collection<int, Recipe>
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(Recipe $recipe): static
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe->add($recipe);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): static
    {
        $this->recipe->removeElement($recipe);

        return $this;
    }

    /**
     * @return Collection<int, Time>
     */
    public function getTime(): Collection
    {
        return $this->time;
    }

    public function addTime(Time $time): static
    {
        if (!$this->time->contains($time)) {
            $this->time->add($time);
        }

        return $this;
    }

    public function removeTime(Time $time): static
    {
        $this->time->removeElement($time);

        return $this;
    }
}
