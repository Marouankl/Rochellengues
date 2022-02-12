<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass:CategorieRepository::class)]
#[ApiResource]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORm\Column(type: Types::INTEGER)]
    private $id;




    #[ORM\Column(type: Types::STRING,length: 255)]
    private $nom;


    #[ORM\OneToMany(targetEntity: Categorie::class, indexBy: 'categorie')]
    private $annonces;


    #[ORM\OneToMany(targetEntity: Categorie::class, indexBy: 'categorie')]
    private $categorie;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Sejours::class)]
    private $sejours;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->categorie = new ArrayCollection();
        $this->sejours = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): string
    {
        return $this->nom = $nom;


    }

    /**
     * @return Collection|Annonces[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonces $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setCategorie($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonces $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getCategorie() === $this) {
                $annonce->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param ArrayCollection $annonces
     */
    public function setAnnonces(ArrayCollection $annonces): void
    {
        $this->annonces = $annonces;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie(?self $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function addCategorie(self $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
            $categorie->setCategorie($this);
        }

        return $this;
    }

    public function removeCategorie(self $categorie): self
    {
        if ($this->categorie->removeElement($categorie)) {
            if ($categorie->getCategorie() === $this) {
                $categorie->setCategorie(null);
            }
        }

        return $this;
    }


    public function __toString(): string
    {
        return (string)$this->getNom();
    }

    /**
     * @return Collection|Sejours[]
     */
    public function getSejours(): Collection
    {
        return $this->sejours;
    }

    public function addSejour(Sejours $sejour): self
    {
        if (!$this->sejours->contains($sejour)) {
            $this->sejours[] = $sejour;
            $sejour->setCategorie($this);
        }

        return $this;
    }

    public function removeSejour(Sejours $sejour): self
    {
        if ($this->sejours->removeElement($sejour)) {
            if ($sejour->getCategorie() === $this) {
                $sejour->setCategorie(null);
            }
        }

        return $this;
    }



}
