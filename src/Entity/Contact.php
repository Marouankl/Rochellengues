<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass:ContactRepository::class)]
#[ApiResource]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORm\Column(type: Types::INTEGER)]
    private int $id;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private $nom;

    #[ORM\Column(type: Types::STRING,length: 255)]
    private $email;


    #[ORm\Column(type: Types::TEXT)]
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function __toString(): string{
        return $this->id;

    }
}
