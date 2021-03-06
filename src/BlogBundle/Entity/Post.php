<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BlogBundle\Entity\User;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="FK_post_id_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\PostRepository")
 */
class Post {
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
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
     * @var \BlogBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $User;



    /**
     * Post constructor.
     */
    public function __construct() {
        $this->date = new \DateTime();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
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
     * @return Post
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
     * Set idUser
     *
     * @param \BlogBundle\Entity\User $User
     *
     * @return Post
     */
    public function setUser(User $User = null) {
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

    public function __toString() {
        return $this->title.' ('.$this->User.')';
    }


}
