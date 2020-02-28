<?php

namespace GroupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="GroupBundle\Repository\MembreRepository")
 * @Notifiable(name="Membre")
 */
class Membre  implements NotifiableInterface
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="idM",referencedColumnName="id",onDelete="CASCADE")
     */
    private $idM;

    /**
     * @ORM\ManyToOne(targetEntity="Groups")
     * @ORM\JoinColumn(name="idG",referencedColumnName="id",onDelete="CASCADE")
     */
    private $idG;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateJoin", type="date")
     */
    private $dateJoin;


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
     * Set dateJoin
     *
     * @param \DateTime $dateJoin
     *
     * @return Membre
     */
    public function setDateJoin($dateJoin)
    {
        $this->dateJoin = $dateJoin;

        return $this;
    }

    /**
     * Get dateJoin
     *
     * @return \DateTime
     */
    public function getDateJoin()
    {
        return $this->dateJoin;
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


}

