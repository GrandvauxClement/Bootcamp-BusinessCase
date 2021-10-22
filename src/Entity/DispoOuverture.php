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
     * @ORM\Column(type="string", length=20)
     */
    private $nomJour;

    /**
     * @ORM\Column(type="boolean")
     */
    private $service_midi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $service_soir;

    /**
     * @ORM\ManyToMany(targetEntity=Etablissement::class, inversedBy="dispoOuvertures")
     */
    private $id_etablissement;

    public function __construct()
    {
        $this->id_etablissement = new ArrayCollection();
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

    /**
     * @return Collection|Etablissement[]
     */
    public function getIdEtablissement(): Collection
    {
        return $this->id_etablissement;
    }

    public function addIdEtablissement(Etablissement $idEtablissement): self
    {
        if (!$this->id_etablissement->contains($idEtablissement)) {
            $this->id_etablissement[] = $idEtablissement;
        }

        return $this;
    }

    public function removeIdEtablissement(Etablissement $idEtablissement): self
    {
        $this->id_etablissement->removeElement($idEtablissement);

        return $this;
    }
}
