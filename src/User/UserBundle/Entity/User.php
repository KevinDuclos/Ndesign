<?php

namespace User\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="User\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\Adresse", cascade={"persist"})
     */
    private $adress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Commande", mappedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set adress.
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress.
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set commande.
     *
     * @param \App\Entity\Commande $commande
     *
     * @return User
     */
    public function setCommande(\App\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande.
     *
     * @return \App\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Add commande.
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return User
     */
    public function addCommande(\AppBundle\Entity\Commande $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande.
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommande(\AppBundle\Entity\Commande $commande)
    {
        return $this->commande->removeElement($commande);
    }
}
