<?php

namespace App\Entity;

use App\Repository\DiscoveryUrlRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscoveryUrlRepository::class)
 */
class DiscoveryUrl
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
     * @ORM\Column(type="string", length=255)
     */
    private string $url;

    /**
     * @ORM\ManyToOne(targetEntity=Discovery::class, inversedBy="urls")
     * @ORM\JoinColumn(nullable=false)
     */
    private Discovery $discovery;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDiscovery(): Discovery
    {
        return $this->discovery;
    }

    public function setDiscovery(Discovery $discovery): self
    {
        $this->discovery = $discovery;

        return $this;
    }
}
