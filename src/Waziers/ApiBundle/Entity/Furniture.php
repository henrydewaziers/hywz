<?php

namespace Waziers\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Furniture
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Furniture
{
//* @JMS\Exclude
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Groups({ "furniture_details" })
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer")
     *
     * @JMS\Groups({ "furniture_details" })
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @JMS\Groups({ "furniture_details" })
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=512)
     *
     * @JMS\Groups({ "furniture_details" })
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="room", type="string", length=16)
     *
     * @JMS\Groups({ "furniture_details" })
     */
    private $room;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param int $ref
     *
     * @return $this
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Furniture
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Furniture
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set room
     *
     * @param string $room
     *
     * @return Furniture
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }
}

