<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class LoginAnnouncementsDefinition
 * @package Speedfreak\Entities\Types
 * @Serializer\XmlRoot(name="LoginAnnouncementsDefinition")
 */
class LoginAnnouncementsDefinition
{
    /**
     * @var LoginAnnouncementDefinition[]
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Announcements")
     * @Serializer\XmlList(entry="LoginAnnouncementDefinition")
     */
    protected $announcements = [];

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ImagesPath")
     */
    protected $imagesPath = '';

    /**
     * @return LoginAnnouncementDefinition[]
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }

    /**
     * @param LoginAnnouncementDefinition[] $announcements
     */
    public function setAnnouncements($announcements)
    {
        $this->announcements = $announcements;
    }

    /**
     * @return string
     */
    public function getImagesPath()
    {
        return $this->imagesPath;
    }

    /**
     * @param string $imagesPath
     */
    public function setImagesPath($imagesPath)
    {
        $this->imagesPath = $imagesPath;
    }
}