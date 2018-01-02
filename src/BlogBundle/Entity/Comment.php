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
     * @var boolean
     *
     * @ORM\Column(name="is_valid", type="boolean")
     */
    private $is_valid;

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
    private $Post;

    /**
     * @var \BlogBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $User;

    /**
     * Comment constructor.
     */
    public function __construct() {
        $this->date = new \DateTime();
    }


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
     * @param \BlogBundle\Entity\Post $Post
     *
     * @return Comment
     */
    public function setPost(\BlogBundle\Entity\Post $Post = null) {
        $this->Post = $Post;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return \BlogBundle\Entity\Post
     */
    public function getPost() {
        return $this->Post;
    }

    /**
     * Set idUser
     *
     * @param \BlogBundle\Entity\User $User
     *
     * @return Comment
     */
    public function setUser(\BlogBundle\Entity\User $User = null) {
        $this->User = $User;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUser() {
        return $this->User;
    }

    /**
     * Set isValid
     *
     * @param boolean $isValid
     *
     * @return Comment
     */
    public function setIsValid($isValid) {
        $this->is_valid = $isValid;

        return $this;
    }

    /**
     * Get isValid
     *
     * @return boolean
     */
    public function getIsValid() {
        return $this->is_valid;
    }

    public function __toString() {
        return $this->content;
    }


}
