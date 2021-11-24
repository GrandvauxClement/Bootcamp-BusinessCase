<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @ORM\Entity(repositoryClass=EtablissementRepository::class)
 */
class Etablissement
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
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_place_total;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accepte_reservation;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $service_midi_debut_time;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $service_midi_fin_time;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $service_soir_debut_time;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $service_soir_fin_time;

    /**
     * @ORM\OneToMany(targetEntity=ImagesRestaurants::class, mappedBy="id_etablissement", orphanRemoval=true)
     */
    private $imagesRestaurants;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCuisine::class, inversedBy="etablissements")
     */
    private $id_type_cuisine;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="etablissements")
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="id_etablissement", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $numTelephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slugFolderImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug_menu;

    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity=RelationRestoJourDispo::class, mappedBy="restaurant", orphanRemoval=true)
     */
    private $relationRestoJourDispos;


    public function __construct()
    {
        $this->imagesRestaurants = new ArrayCollection();
        $this->dispoOuvertures = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->relationRestoJourDispos = new ArrayCollection();
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
        if (empty($this->slugFolderImage)){
            $slugFolder = '';
            $arrayNameWithoutSpace = explode(' ', $this->nom);
            foreach ($arrayNameWithoutSpace as $word){
                $slugFolder .= ucfirst($word);
            }
            $this->slugFolderImage = $slugFolder;
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNbrePlaceTotal(): ?int
    {
        return $this->nbre_place_total;
    }

    public function setNbrePlaceTotal(int $nbre_place_total): self
    {
        $this->nbre_place_total = $nbre_place_total;

        return $this;
    }

    public function getAccepteReservation(): ?bool
    {
        return $this->accepte_reservation;
    }

    public function setAccepteReservation(bool $accepte_reservation): self
    {
        $this->accepte_reservation = $accepte_reservation;

        return $this;
    }

    public function getServiceMidiDebutTime(): ?\DateTimeInterface
    {
        return $this->service_midi_debut_time;
    }

    public function setServiceMidiDebutTime(?\DateTimeInterface $service_midi_debut_time): self
    {
        $this->service_midi_debut_time = $service_midi_debut_time;

        return $this;
    }

    public function getServiceMidiFinTime(): ?\DateTimeInterface
    {
        return $this->service_midi_fin_time;
    }

    public function setServiceMidiFinTime(?\DateTimeInterface $service_midi_fin_time): self
    {
        $this->service_midi_fin_time = $service_midi_fin_time;

        return $this;
    }

    public function getServiceSoirDebutTime(): ?\DateTimeInterface
    {
        return $this->service_soir_debut_time;
    }

    public function setServiceSoirDebutTime(?\DateTimeInterface $service_soir_debut_time): self
    {
        $this->service_soir_debut_time = $service_soir_debut_time;

        return $this;
    }

    public function getServiceSoirFinTime(): ?\DateTimeInterface
    {
        return $this->service_soir_fin_time;
    }

    public function setServiceSoirFinTime(?\DateTimeInterface $service_soir_fin_time): self
    {
        $this->service_soir_fin_time = $service_soir_fin_time;

        return $this;
    }

    /**
     * @return Collection|ImagesRestaurants[]
     */
    public function getImagesRestaurants(): Collection
    {
        return $this->imagesRestaurants;
    }

    public function addImagesRestaurant(ImagesRestaurants $imagesRestaurant): self
    {
        if (!$this->imagesRestaurants->contains($imagesRestaurant)) {
            $this->imagesRestaurants[] = $imagesRestaurant;
            $imagesRestaurant->setIdEtablissement($this);
        }

        return $this;
    }

    public function removeImagesRestaurant(ImagesRestaurants $imagesRestaurant): self
    {
        if ($this->imagesRestaurants->removeElement($imagesRestaurant)) {
            // set the owning side to null (unless already changed)
            if ($imagesRestaurant->getIdEtablissement() === $this) {
                $imagesRestaurant->setIdEtablissement(null);
            }
        }

        return $this;
    }

    public function getIdTypeCuisine(): ?TypeCuisine
    {
        return $this->id_type_cuisine;
    }

    public function setIdTypeCuisine(?TypeCuisine $id_type_cuisine): self
    {
        $this->id_type_cuisine = $id_type_cuisine;

        return $this;
    }


    /**
     * @return Collection|Tags[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tags $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tags $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setIdEtablissement($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIdEtablissement() === $this) {
                $reservation->setIdEtablissement(null);
            }
        }

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNumTelephone(): ?string
    {
        return $this->numTelephone;
    }

    public function setNumTelephone(string $numTelephone): self
    {
        $this->numTelephone = $numTelephone;

        return $this;
    }

    public function getSlugFolderImage(): ?string
    {
        return $this->slugFolderImage;
    }

    public function setSlugFolderImage(string $slugFolderImage): self
    {
        $this->slugFolderImage = $slugFolderImage;

        return $this;
    }

    public function getSlugMenu(): ?string
    {
        return $this->slug_menu;
    }

    public function setSlugMenu(?string $slug_menu): self
    {
        $this->slug_menu = $slug_menu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param mixed $imageFile
     */
    public function setImageFile($imageFile): void
    {
        $this->imageFile = $imageFile;
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
            $relationRestoJourDispo->setRestaurant($this);
        }

        return $this;
    }

    public function removeRelationRestoJourDispo(RelationRestoJourDispo $relationRestoJourDispo): self
    {
        if ($this->relationRestoJourDispos->removeElement($relationRestoJourDispo)) {
            // set the owning side to null (unless already changed)
            if ($relationRestoJourDispo->getRestaurant() === $this) {
                $relationRestoJourDispo->setRestaurant(null);
            }
        }

        return $this;
    }
}
