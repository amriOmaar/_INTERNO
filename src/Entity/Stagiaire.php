<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stagiaire
 *
 * @ORM\Table(name="stagiaire", uniqueConstraints={@ORM\UniqueConstraint(name="mail", columns={"mail"})}, indexes={@ORM\Index(name="encadrant", columns={"encadrant"}), @ORM\Index(name="nom", columns={"nom"})})
 * @ORM\Entity
 */
class Stagiaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="idStagiaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstagiaire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="numTel", type="integer", nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=100, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="faculte", type="string", length=100, nullable=false)
     */
    private $faculte;

    /**
     * @var string
     *
     * @ORM\Column(name="stage", type="string", length=100, nullable=false)
     */
    private $stage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=false)
     */
    private $image;

    /**
     * @var \Encadrant
     *
     * @ORM\ManyToOne(targetEntity="Encadrant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="encadrant", referencedColumnName="nom")
     * })
     */
    private $encadrant;

    public function getIdstagiaire(): ?int
    {
        return $this->idstagiaire;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getFaculte(): ?string
    {
        return $this->faculte;
    }

    public function setFaculte(string $faculte): self
    {
        $this->faculte = $faculte;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEncadrant(): ?Encadrant
    {
        return $this->encadrant;
    }

    public function setEncadrant(?Encadrant $encadrant): self
    {
        $this->encadrant = $encadrant;

        return $this;
    }


}
