<?php

namespace App\Entity;

use App\Repository\CinemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinemaRepository::class)]
class Cinema
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'cinema')]
    private Collection $cinemaReservations;

    public function __construct()
    {
        $this->cinemaReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getCinemaReservations(): Collection
    {
        return $this->cinemaReservations;
    }

    public function addCinemaReservation(Reservation $cinemaReservation): static
    {
        if (!$this->cinemaReservations->contains($cinemaReservation)) {
            $this->cinemaReservations->add($cinemaReservation);
            $cinemaReservation->setCinema($this);
        }

        return $this;
    }

    public function removeCinemaReservation(Reservation $cinemaReservation): static
    {
        if ($this->cinemaReservations->removeElement($cinemaReservation)) {
            // set the owning side to null (unless already changed)
            if ($cinemaReservation->getCinema() === $this) {
                $cinemaReservation->setCinema(null);
            }
        }

        return $this;
    }
}
