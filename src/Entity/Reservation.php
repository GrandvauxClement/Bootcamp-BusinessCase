<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom doit être renseigné")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom doit être renseigné")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Le numéro de téléphone doit être renseigné")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank(message="L'heure d'arrivé' doit être renseigné")
     */
    private $heure_arrive;

    private $stock_heure_arrive;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Le nombre de place doit être renseigné")
     */
    private $nbre_place;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Etablissement::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_etablissement;

    /**
     * @ORM\ManyToOne(targetEntity=EtatReservation::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_etat_reservation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReservation;

    public function __construct($etablissement)
    {
        $this->created_at = new \DateTimeImmutable('now');
        $this->id_etablissement = $etablissement;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getNumTel(): ?string
    {
        return $this->num_tel;
    }

    public function setNumTel(string $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getHeureArrive(): ?\DateTimeInterface
    {
        return $this->heure_arrive;
    }

    public function setHeureArrive(\DateTimeInterface $heure_arrive): self
    {
        $this->heure_arrive = $heure_arrive;

        return $this;
    }

    public function getNbrePlace(): ?int
    {
        return $this->nbre_place;
    }

    public function setNbrePlace(int $nbre_place): self
    {
        $this->nbre_place = $nbre_place;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

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

    public function getIdEtatReservation(): ?EtatReservation
    {
        return $this->id_etat_reservation;
    }

    public function setIdEtatReservation(?EtatReservation $id_etat_reservation): self
    {
        $this->id_etat_reservation = $id_etat_reservation;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * @return mixed
     */
        public function getStockHeureArrive()
        {
            return $this->stock_heure_arrive;
        }

      /**
     * @param mixed $stock_heure_arrive
     */
    public function setStockHeureArrive($stock_heure_arrive): void
    {
        $this->heure_arrive = new \DateTime($stock_heure_arrive.':00');
        $this->stock_heure_arrive = $stock_heure_arrive;
    }

}
