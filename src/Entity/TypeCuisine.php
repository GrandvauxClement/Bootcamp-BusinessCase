<?php

namespace App\Entity;

use App\Repository\TypeCuisineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCuisineRepository::class)
 */
class TypeCuisine implements Translatable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom doit être renseigné")
     * @Assert\Unique(message="Ce nom existe déjà choisis en un autre !")
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Etablissement::class, mappedBy="id_type_cuisine")
     */
    private $etablissements;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    public function __construct()
    {
        $this->etablissements = new ArrayCollection();
    }

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

    /**
     * @return Collection|Etablissement[]
     */
    public function getEtablissements(): Collection
    {
        return $this->etablissements;
    }

    public function addEtablissement(Etablissement $etablissement): self
    {
        if (!$this->etablissements->contains($etablissement)) {
            $this->etablissements[] = $etablissement;
            $etablissement->setIdTypeCuisine($this);
        }

        return $this;
    }

    public function removeEtablissement(Etablissement $etablissement): self
    {
        if ($this->etablissements->removeElement($etablissement)) {
            // set the owning side to null (unless already changed)
            if ($etablissement->getIdTypeCuisine() === $this) {
                $etablissement->setIdTypeCuisine(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nom;
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
