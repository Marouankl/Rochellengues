<?php

namespace App\Entity;

use App\Repository\SejourRepository;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass:SejourRepository::class)]
#[ApiResource]
class Sejours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORm\Column(type: Types::INTEGER)]
    private ?int $id;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private $titre;



    #[ORm\Column(type: Types::INTEGER)]
    private $prix;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private $langue;

    #[ORm\Column(type: Types::INTEGER)]
    private $age;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private $pays;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'sejours')]
    #[ORM\JoinColumn(nullable:false)]
    private $categorie;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private $start_date;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private $end_date;


    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }





    public function getId(): ?int
    {
        return $this->id;
    }





    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function __toString(): string{
            return $this->id;

    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }


}
