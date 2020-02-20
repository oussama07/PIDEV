<?php

namespace GroupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="GroupBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User" , cascade={"persist"})
     * @ORM\JoinColumn(name="idM",referencedColumnName="id")
     */
    private $idM;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Groups")
     * @ORM\JoinColumn(name="idG",referencedColumnName="id",onDelete="CASCADE")
     */
    private $idG;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePost", type="date")
     */
    private $datePost;

    /**
     * @var string
     *
     * @ORM\Column(name="Msg", type="string")
     */
    private $Msg;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datePost
     *
     * @param \DateTime $datePost
     *
     * @return Post
     */
    public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }

    /**
     * Get datePost
     *
     * @return \DateTime
     */
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * @return mixed
     */
    public function getIdM()
    {
        return $this->idM;
    }

    /**
     * @param mixed $idM
     */
    public function setIdM($idM)
    {
        $this->idM = $idM;
    }

    /**
     * @return mixed
     */
    public function getIdG()
    {
        return $this->idG;
    }

    /**
     * @param mixed $idG
     */
    public function setIdG($idG)
    {
        $this->idG = $idG;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->Msg;
    }

    /**
     * @param string $Msg
     */
    public function setMsg($Msg)
    {
        $this->Msg = $Msg;
    }



}

