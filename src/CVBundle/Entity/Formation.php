<?php

namespace CVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="CVBundle\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_debut", type="date", nullable=true)
     */
    private $anneeDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_fin", type="date", nullable=true)
     */
    private $anneeFin;

    /**
     * @var string
     *
     * @ORM\Column(name="annee_courante", type="string", length=25, nullable=true)
     */
    private $anneeCourante;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=100, nullable=true)
     */
    private $intitule;

    /**
     * @var string
     *
     * @ORM\Column(name="ecole", type="string", length=255, nullable=true)
     */
    private $ecole;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=true)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="codepostal", type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set anneeDebut
     *
     * @param \DateTime $anneeDebut
     *
     * @return Formation
     */
    public function setAnneeDebut($anneeDebut)
    {
        $this->anneeDebut = $anneeDebut;

        return $this;
    }

    /**
     * Get anneeDebut
     *
     * @return \DateTime
     */
    public function getAnneeDebut()
    {
        return $this->anneeDebut;
    }

    /**
     * Set anneeFin
     *
     * @param \DateTime $anneeFin
     *
     * @return Formation
     */
    public function setAnneeFin($anneeFin)
    {
        $this->anneeFin = $anneeFin;

        return $this;
    }

    /**
     * Get anneeFin
     *
     * @return \DateTime
     */
    public function getAnneeFin()
    {
        return $this->anneeFin;
    }

    /**
     * Set anneeCourante
     *
     * @param string $anneeCourante
     *
     * @return Formation
     */
    public function setAnneeCourante($anneeCourante)
    {
        $this->anneeCourante = $anneeCourante;

        return $this;
    }

    /**
     * Get anneeCourante
     *
     * @return string
     */
    public function getAnneeCourante()
    {
        return $this->anneeCourante;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Formation
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set ecole
     *
     * @param string $ecole
     *
     * @return Formation
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

    /**
     * Get ecole
     *
     * @return string
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Formation
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Formation
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Formation
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
