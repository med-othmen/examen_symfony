<?php

namespace App\Entity;

use App\Repository\OthmenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OthmenRepository::class)
 */
class Othmen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlbutton;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $txtbutton;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUrlbutton(): ?string
    {
        return $this->urlbutton;
    }

    public function setUrlbutton(?string $urlbutton): self
    {
        $this->urlbutton = $urlbutton;

        return $this;
    }

    public function getTxtbutton(): ?string
    {
        return $this->txtbutton;
    }

    public function setTxtbutton(?string $txtbutton): self
    {
        $this->txtbutton = $txtbutton;

        return $this;
    }
}
