<?php

namespace SNT\ImmobilierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="SNT\ImmobilierBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=50, nullable=false)
     */
    private $nomComplet;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=30, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=30)
     */
    private $pwd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenais", type="datetime")
     */
    private $datenais;

    /**
   * @ORM\ManyToMany(targetEntity="SNT\ImmobilierBundle\Entity\Role", cascade={"persist"})
   */
    private $roles;


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
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return Utilisateur
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     *
     * @return Utilisateur
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set datenais
     *
     * @param \DateTime $datenais
     *
     * @return Utilisateur
     */
    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;

        return $this;
    }

    /**
     * Get datenais
     *
     * @return \DateTime
     */
    public function getDatenais()
    {
        return $this->datenais;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add role
     *
     * @param \SNT\ImmobilierBundle\Entity\Role $role
     *
     * @return Utilisateur
     */
    public function addRole(\SNT\ImmobilierBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \SNT\ImmobilierBundle\Entity\Role $role
     */
    public function removeRole(\SNT\ImmobilierBundle\Entity\Role $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
