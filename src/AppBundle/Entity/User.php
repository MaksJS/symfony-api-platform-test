<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A meetup user
 *
 * @ApiResource
 * @ORM\Entity
 */
class User
{
    /**
     * @var string The user indentifier
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string The user name
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string The user email
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @var string The user password
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $password;

    /**
     * Many Users have Many Groups.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Group")
     */
    private $groups;

    /**
     * Many Users have Many Event.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Event")
     */
    private $events;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function getGroups()
    {
        return $this->groups;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function setGroups($value) 
    {
        $this->groups = $value;
    }

    public function setEvents($value) 
    {
        $this->events = $value;
    }
}
