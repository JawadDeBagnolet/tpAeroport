<?php

namespace App\Entity;

use App\Repository\VolRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VolRepository::class)
 */
class Vol
{
    // Destination
    #[Assert\NotBlank(message: 'La destination est obligatoire')]
    #[ORM\Column(type: 'string', length: 255)]
    private string $destination;

    // Heure de départ
    #[Assert\GreaterThan('now', message: "L'heure de départ doit être ultérieure")]
    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $heureDepart;

    // Heure d'arrivée
    #[Assert\GreaterThan(propertyPath: 'heureDepart', message: "L'heure d'arrivée doit être après le départ")]
    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $heureArrivee;

    // Prix
    #[Assert\Positive(message: 'Le prix doit être positif')]
    #[ORM\Column(type: 'float')]
    private float $prix;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heureArrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heureArrivee): self
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
