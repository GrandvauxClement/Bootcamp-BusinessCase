<?php

namespace App\Entity;

use App\Repository\DispoOuvertureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispoOuvertureRepository::class)
 */
class DispoOuverture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $service_midi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $service_soir;

    /**
     * @ORM\OneToMany(targetEntity=RelationRestoJourDispo::class, mappedBy="dispoOuverture")
     */
    private $relationRestoJourDispos;


    public function __construct()
    {
        $this->id_etablissement = new ArrayCollection();
        $this->relationRestoJourDispos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJour(): ?string
    {
        return $this->nomJour;
    }

    public function setNomJour(string $nomJour): self
    {
        $this->nomJour = $nomJour;

        return $this;
    }

    public function getServiceMidi(): ?bool
    {
        return $this->service_midi;
    }

    public function setServiceMidi(bool $service_midi): self
    {
        $this->service_midi = $service_midi;

        return $this;
    }

    public function getServiceSoir(): ?bool
    {
        return $this->service_soir;
    }

    public function setServiceSoir(bool $service_soir): self
    {
        $this->service_soir = $service_soir;

        return $this;
    }

    public function __toString()
    {
        if ($this->service_midi && $this->service_soir){
            return $this->nomJour.' Service midi et soir';
        }elseif ($this->service_midi && !$this->service_soir){
            return $this->nomJour.' Service uniquement le midi';
        }elseif (!$this->service_midi && $this->service_soir){
            return $this->nomJour.' Service uniquement le soir';
        }else {
            return $this->nomJour.' Aucun service';
        }

    }

    /**
     * @return Collection|RelationRestoJourDispo[]
     */
    public function getRelationRestoJourDispos(): Collection
    {
        return $this->relationRestoJourDispos;
    }

    public function addRelationRestoJourDispo(RelationRestoJourDispo $relationRestoJourDispo): self
    {
        if (!$this->relationRestoJourDispos->contains($relationRestoJourDispo)) {
            $this->relationRestoJourDispos[] = $relationRestoJourDispo;
            $relationRestoJourDispo->setDispoOuverture($this);
        }

        return $this;
    }

    public function removeRelationRestoJourDispo(RelationRestoJourDispo $relationRestoJourDispo): self
    {
        if ($this->relationRestoJourDispos->removeElement($relationRestoJourDispo)) {
            // set the owning side to null (unless already changed)
            if ($relationRestoJourDispo->getDispoOuverture() === $this) {
                $relationRestoJourDispo->setDispoOuverture(null);
            }
        }

        return $this;
    }
}
