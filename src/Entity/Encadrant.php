<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encadrant
 *
 * @ORM\Table(name="encadrant", indexes={@ORM\Index(name="nom", columns={"nom"}), @ORM\Index(name="idEncadrant", columns={"idEncadrant"})})
 * @ORM\Entity
 */
class Encadrant
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nom;
    public function __toString() {
        return strval($this->nom);
    }

    /**
     * @var int
     *
     * @ORM\Column(name="idEncadrant", type="integer", nullable=false)
     */
    private $idencadrant;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=100, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=100, nullable=false)
     */
    private $poste;

    /**
     * @var int
     *
     * @ORM\Column(name="numTel", type="integer", nullable=false)
     */
    private $numtel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(int $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdencadrant(): ?int
    {
        return $this->idencadrant;
    }

    public function setIdencadrant(int $idencadrant): self
    {
        $this->idencadrant = $idencadrant;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getNumtel(): ?int
    {
        return $this->numtel;
    }

    public function setNumtel(int $numtel): self
    {
        $this->numtel = $numtel;

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


}
