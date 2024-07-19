<?php

// src/Entity/Planner.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PlannerRepository;

#[ORM\Entity(repositoryClass: PlannerRepository::class)]
class Planner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'planner', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: PlannerRecipe::class, mappedBy: 'planner', cascade: ['persist', 'remove'])]
    private Collection $plannerRecipes;

    public function __construct()
    {
        $this->plannerRecipes = new ArrayCollection();
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
     * @return Collection<int, PlannerRecipe>
     */
    public function getPlannerRecipes(): Collection
    {
        return $this->plannerRecipes;
    }

    public function addPlannerRecipe(PlannerRecipe $plannerRecipe): static
    {
        if (!$this->plannerRecipes->contains($plannerRecipe)) {
            $this->plannerRecipes[] = $plannerRecipe;
            $plannerRecipe->setPlanner($this);
        }

        return $this;
    }

    public function removePlannerRecipe(PlannerRecipe $plannerRecipe): static
    {
        if ($this->plannerRecipes->removeElement($plannerRecipe)) {
            if ($plannerRecipe->getPlanner() === $this) {
                $plannerRecipe->setPlanner(null);
            }
        }

        return $this;
    }
}

