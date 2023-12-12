<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 175)]
    private ?string $Titre = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_publication = null;

    #[ORM\ManyToOne(inversedBy: 'videos')]
    private ?Chaine $Chaine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->Date_publication;
    }

    public function setDatePublication(\DateTimeInterface $Date_publication): static
    {
        $this->Date_publication = $Date_publication;

        return $this;
    }

    public function getChaine(): ?Chaine
    {
        return $this->Chaine;
    }

    public function setChaine(?Chaine $Chaine): static
    {
        $this->Chaine = $Chaine;

        return $this;
    }
}
