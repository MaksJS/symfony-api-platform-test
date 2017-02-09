<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A meetup group
 *
 * @ApiResource
 * @ORM\Table(name="meetup_group")
 * @ORM\Entity
 */
class Group
{
    /**
     * @var string The meetup indentifier
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string The group name
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string The group city
     *
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @var string The group description
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Many Groups have Many Users.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="group_user",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $users;

    /**
     * Many Groups have Many Admins.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="group_admin",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $admins;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function getAdmins()
    {
        return $this->admins;
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

    public function setCity($value)
    {
        $this->city = $value;
    }

    public function setAdmins($value) 
    {
        $this->admins = $value;
    }

    public function setUsers($value) 
    {
        $this->users = $value;
    }
}
