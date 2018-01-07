<?php

namespace CVBundle\Entity;

use CVBundle\Lib\Globals;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Competence
 *
 * @ORM\Table(name="competence")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Competence {

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=50, nullable=true)
     */
    private $intitule;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="competence_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imagePath;


    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(?File $image = null): void {
        $this->imageFile = $image;

        $path = $this->getUploadedCompetenceImagePath();
        $this->setImagePath($path.'/'.$this->getImageName());

        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }


    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int {
        return $this->imageSize;
    }

    public function setImagePath(?string $imagePath): void {
        $this->imagePath = $imagePath;
    }

    public function getImagePath(): ?string {
        return $this->imagePath;
    }


    public function getUploadedCompetenceImagePath(){
        return Globals::getUploadCompetenceDir();
    }


    /**
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Competence
     */
    public function setIntitule($intitule) {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule() {
        return $this->intitule;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return (string)$this->intitule;
    }


}
