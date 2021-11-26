<?php

namespace App\Entity;

use App\Repository\ImagesRestaurantsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRestaurantsRepository::class)
 */
class ImagesRestaurants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="imagesRestaurants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_etablissement;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdEtablissement(): ?Etablissement
    {
        return $this->id_etablissement;
    }

    public function setIdEtablissement(?Etablissement $id_etablissement): self
    {
        $this->id_etablissement = $id_etablissement;

        return $this;
    }
    public function __toString()
    {
        return $this->url;
    }
}
