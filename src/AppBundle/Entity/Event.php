<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A meetup event
 *
 * @ApiResource
 * @ORM\Entity
 */
class Event
{
    /**
     * @var string The event indentifier
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string The event name
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string The event description
     *
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var datetime The event start date
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $date_start;

    /**
     * @var datetime The event end date
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $date_end;

    /**
     * Many Events have One Group.
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    private $group;

    /**
     * Many Events have Many Users.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="User")
     */
    private $users;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateStart()
    {
        return $this->date_start;
    }
    
    public function getDateEnd()
    {
        return $this->date_end;
    }

    public function getGroup()
    {
        return $this->group;
    }
    
    public function getUsers()
    {
        return $this->users;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function setDateStart($value)
    {
        $this->date_start = $value;
    }

    public function setDateEnd($value)
    {
        $this->date_end = $value;
    }

    public function setGroup($value) 
    {
        $this->group = $value;
    }

    public function setUsers($value) 
    {
        $this->users = $value;
    }
}
