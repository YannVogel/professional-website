<?php

namespace App\Entity;

use App\Repository\DiscoveryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscoveryRepository::class)
 */
class Discovery
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
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $coverImage;

    /**
     * @ORM\ManyToOne(targetEntity=DiscoveryCategory::class, inversedBy="discovery")
     * @ORM\JoinColumn(nullable=false)
     */
    private DiscoveryCategory $category;

    /**
     * @ORM\OneToMany(targetEntity=DiscoveryUrl::class, mappedBy="discovery", orphanRemoval=true)
     */
    private ArrayCollection $urls;

    public function __construct()
    {
        $this->urls = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getCategory(): DiscoveryCategory
    {
        return $this->category;
    }

    public function setCategory(DiscoveryCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|DiscoveryUrl[]
     */
    public function getUrls(): Collection
    {
        return $this->urls;
    }

    public function addUrl(DiscoveryUrl $url): self
    {
        if (!$this->urls->contains($url)) {
            $this->urls[] = $url;
            $url->setDiscovery($this);
        }

        return $this;
    }

    public function removeUrl(DiscoveryUrl $url): self
    {
        if ($this->urls->contains($url)) {
            $this->urls->removeElement($url);
            // set the owning side to null (unless already changed)
            if ($url->getDiscovery() === $this) {
                $url->setDiscovery(null);
            }
        }

        return $this;
    }
}
