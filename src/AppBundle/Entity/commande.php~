<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use User\UserBundle\Entity\User;

/**
 * commande
 *
 * @ORM\Table(name="ND_commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User\UserBundle\Entity\User", inversedBy="commande")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Produit", cascade={"persist"})
     */
    private $produits;

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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->produit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add produit.
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Commande
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit.
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        return $this->produits->removeElement($produit);
    }

    /**
     * Get produits.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set user.
     *
     * @param \User\UserBundle\Entity\User|null $user
     *
     * @return Commande
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \User\UserBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
