<?php

namespace App\Entity;

use App\Repository\RelationRestoJourDispoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelationRestoJourDispoRepository::class)
 */
class RelationRestoJourDispo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="relationRestoJourDispos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=DispoOuverture::class, inversedBy="relationRestoJourDispos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dispoOuverture;

    /**
     * @ORM\ManyToOne(targetEntity=JourSemaine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomJour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurant(): ?Etablissement
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Etablissement $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getDispoOuverture(): ?DispoOuverture
    {
        return $this->dispoOuverture;
    }

    public function setDispoOuverture(?DispoOuverture $dispoOuverture): self
    {
        $this->dispoOuverture = $dispoOuverture;

        return $this;
    }

    public function getNomJour(): ?JourSemaine
    {
        return $this->nomJour;
    }

    public function setNomJour(?JourSemaine $nomJour): self
    {
        $this->nomJour = $nomJour;

        return $this;
    }
}
