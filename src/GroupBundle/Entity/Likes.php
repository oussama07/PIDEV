<?php

namespace GroupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Likes
 *
 * @ORM\Table(name="likes")
 * @ORM\Entity(repositoryClass="GroupBundle\Repository\LikesRepository")
 */
class Likes
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User" , cascade={"persist"})
     * @ORM\JoinColumn(name="idU",referencedColumnName="id")
     */
    private $idU;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="idP",referencedColumnName="id",onDelete="CASCADE")
     */
    private $idP;

    /**
     * @return mixed
     */
    public function getIdU()
    {
        return $this->idU;
    }

    /**
     * @param mixed $idU
     */
    public function setIdU($idU)
    {
        $this->idU = $idU;
    }

    /**
     * @return mixed
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param mixed $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }


}

