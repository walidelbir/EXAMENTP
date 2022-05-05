<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Designation;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: PFE::class)]
    private $ListePFE;

    public function __construct()
    {
        $this->ListePFE = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(?string $Designation): self
    {
        $this->Designation = $Designation;

        return $this;
    }
    public function __toString()
    {
        return $this->Designation;
    }
    /**
     * @return Collection<int, PFE>
     */
    public function getListePFE(): Collection
    {
        return $this->ListePFE;
    }

    public function addListePFE(PFE $listePFE): self
    {
        if (!$this->ListePFE->contains($listePFE)) {
            $this->ListePFE[] = $listePFE;
            $listePFE->setEntreprise($this);
        }

        return $this;
    }

    public function removeListePFE(PFE $listePFE): self
    {
        if ($this->ListePFE->removeElement($listePFE)) {
            // set the owning side to null (unless already changed)
            if ($listePFE->getEntreprise() === $this) {
                $listePFE->setEntreprise(null);
            }
        }

        return $this;
    }
}
