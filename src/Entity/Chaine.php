<?php

namespace App\Entity;

use App\Repository\ChaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChaineRepository::class)]
class Chaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $Libelle = null;

    #[ORM\Column(length: 200)]
    private ?string $Diffuseur = null;

    #[ORM\OneToMany(mappedBy: 'Chaine', targetEntity: Video::class)]
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): static
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getDiffuseur(): ?string
    {
        return $this->Diffuseur;
    }

    public function setDiffuseur(string $Diffuseur): static
    {
        $this->Diffuseur = $Diffuseur;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setChaine($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): static
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getChaine() === $this) {
                $video->setChaine(null);
            }
        }

        return $this;
    }
}
