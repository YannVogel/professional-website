<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $repositoryUrl;

    /**
     * @ORM\ManyToOne(targetEntity=ProjectCategory::class, inversedBy="project")
     * @ORM\JoinColumn(nullable=false)
     */
    private ProjectCategory $category;

    /**
     * @ORM\ManyToMany(targetEntity=Technology::class, mappedBy="project")
     */
    private ArrayCollection $technologies;

    /**
     * @ORM\OneToMany(targetEntity=ProjectImage::class, mappedBy="project", orphanRemoval=true)
     */
    private ArrayCollection $images;

    public function __construct()
    {
        $this->technologies = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    public function getRepositoryUrl(): ?string
    {
        return $this->repositoryUrl;
    }

    public function setRepositoryUrl(?string $repositoryUrl): self
    {
        $this->repositoryUrl = $repositoryUrl;

        return $this;
    }

    public function getCategory(): ?ProjectCategory
    {
        return $this->category;
    }

    public function setCategory(ProjectCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Technology[]
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technology $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies[] = $technology;
            $technology->addProject($this);
        }

        return $this;
    }

    public function removeTechnology(Technology $technology): self
    {
        if ($this->technologies->contains($technology)) {
            $this->technologies->removeElement($technology);
            $technology->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProjectImage[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ProjectImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProject($this);
        }

        return $this;
    }

    public function removeImage(ProjectImage $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProject() === $this) {
                $image->setProject(null);
            }
        }

        return $this;
    }
}
