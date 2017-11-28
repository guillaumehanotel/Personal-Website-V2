<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="FK_comment_id_user", columns={"id_user"}), @ORM\Index(name="FK_comment_id_post", columns={"id_post"})})
 * @ORM\Entity
 */
class Comment {
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \BlogBundle\Entity\Post
     *
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Post")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     * })
     */
    private $idPost;

    /**
     * @var \BlogBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set idPost
     *
     * @param \BlogBundle\Entity\Post $idPost
     *
     * @return Comment
     */
    public function setIdPost(\BlogBundle\Entity\Post $idPost = null) {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return \BlogBundle\Entity\Post
     */
    public function getIdPost() {
        return $this->idPost;
    }

    /**
     * Set idUser
     *
     * @param \BlogBundle\Entity\User $idUser
     *
     * @return Comment
     */
    public function setIdUser(\BlogBundle\Entity\User $idUser = null) {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \BlogBundle\Entity\User
     */
    public function getIdUser() {
        return $this->idUser;
    }
}