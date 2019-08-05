<?php

namespace HomePageManagmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="HomePageManagmentBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="login", type="string", length=20, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="reset_token", type="string", length=255, unique=true, nullable=true)
     */
    private $resetToken;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_token", type="string", length=255, unique=true)
     */
    private $activationToken;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_status", type="boolean")
     */
    private $activationStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


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
     * Set login
     *
     * @param string $login
     *
     * @return User
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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set resetToken
     *
     * @param string $resetToken
     *
     * @return User
     */
    public function setResetToken($resetToken)
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    /**
     * Get resetToken
     *
     * @return string
     */
    public function getResetToken()
    {
        return $this->resetToken;
    }

    /**
     * Set activationToken
     *
     * @param string $activationToken
     *
     * @return User
     */
    public function setActivationToken($activationToken)
    {
        $this->activationToken = $activationToken;

        return $this;
    }

    /**
     * Get activationToken
     *
     * @return string
     */
    public function getActivationToken()
    {
        return $this->activationToken;
    }

    /**
     * Set activationStatus
     *
     * @param string $activationStatus
     *
     * @return User
     */
    public function setActivationStatus($activationStatus)
    {
        $this->activationStatus = $activationStatus;

        return $this;
    }

    /**
     * Get activationStatus
     *
     * @return string
     */
    public function getActivationStatus()
    {
        return $this->activationStatus;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}

