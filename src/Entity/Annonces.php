<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Type;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiResource;





/**
 * @Vich\Uploadable]

 **/
#[ORM\Entity(repositoryClass:AnnoncesRepository::class)]
#[ApiResource]
#[ORM\Table(name: 'annonces')]
class Annonces
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORm\Column(type: 'integer')]
    private  $id;


    #[ORM\Column(type: 'string',length: 255)]
    private string $titre;


    #[ORM\Column(type: 'text',length: 255)]
    private string $description;




    public function setId(int $id): void
    {
        $this->id = $id;
    }

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;


    #[ORM\Column(type: 'string',length: 255)]
    private  $images;

    /**
     * @Vich\UploadableField(mapping="annonces", fileNameProperty="images")
     * @var File
     */

    private File $imageFile;


    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie;


    #[ORM\Column(type: 'datetime')]
    private $update_at;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }



    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getUser()
    {
        return $this->user;
    }

    public function setUser( $user): self
    {
        $this->user = $user;

        return $this;
    }





    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


    public function getImageFile()
    {
        return $this->imageFile;
    }


    /**
     * @param File|null $images
     * @return Annonces
     */
    public function setImageFile(File $images = null): Annonces
    {
        $this->imageFile = $images;
        if ($this->imageFile instanceof UploadedFile) {
            $this->update_at = new \DateTime('now');
        }
        return $this;

    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }



    public function getImages()
    {
        return $this->images;
    }


    public function setImages($images)
    {
        $this->images = $images;


    }


}
