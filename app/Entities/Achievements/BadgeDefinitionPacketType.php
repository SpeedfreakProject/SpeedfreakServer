<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Achievements;

use JMS\Serializer\Annotation as Serializer;

class BadgeDefinitionPacketType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Background")
     */
    protected $background = '';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("BadgeDefinitionId")
     */
    protected $badgeDefinitionId = -1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Border")
     */
    protected $border = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Description")
     */
    protected $description = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Icon")
     */
    protected $icon = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Name")
     */
    protected $name = '';

    /**
     * BadgeDefinitionPacketType constructor.
     * @param string $background
     * @param int $badgeDefinitionId
     * @param string $border
     * @param string $description
     * @param string $icon
     * @param string $name
     */
    public function __construct(
        $background = '',
        $badgeDefinitionId = -1,
        $border = '',
        $description = '',
        $icon = '',
        $name = ''
    ) {
        $this->background = $background;
        $this->badgeDefinitionId = $badgeDefinitionId;
        $this->border = $border;
        $this->description = $description;
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * @return int
     */
    public function getBadgeDefinitionId()
    {
        return $this->badgeDefinitionId;
    }

    /**
     * @param int $badgeDefinitionId
     */
    public function setBadgeDefinitionId($badgeDefinitionId)
    {
        $this->badgeDefinitionId = $badgeDefinitionId;
    }

    /**
     * @return string
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @param string $border
     */
    public function setBorder($border)
    {
        $this->border = $border;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}