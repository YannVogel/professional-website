<?php

namespace App\Entity;

use App\Repository\DiscoveryCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscoveryCategoryRepository::class)
 */
class DiscoveryCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=Discovery::class, mappedBy="category", orphanRemoval=true)
     */
    private ArrayCollection $discovery;

    public function __construct()
    {
        $this->discovery = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Discovery[]
     */
    public function getDiscovery(): Collection
    {
        return $this->discovery;
    }

    public function addDiscovery(Discovery $discovery): self
    {
        if (!$this->discovery->contains($discovery)) {
            $this->discovery[] = $discovery;
            $discovery->setCategory($this);
        }

        return $this;
    }

    public function removeDiscovery(Discovery $discovery): self
    {
        if ($this->discovery->contains($discovery)) {
            $this->discovery->removeElement($discovery);
            // set the owning side to null (unless already changed)
            if ($discovery->getCategory() === $this) {
                $discovery->setCategory(null);
            }
        }

        return $this;
    }
}
