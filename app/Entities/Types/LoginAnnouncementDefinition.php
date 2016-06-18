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

class LoginAnnouncementDefinition
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Context")
     */
    protected $context = 'NotApplicable';

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Id")
     */
    protected $id = 0;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ImageChecksum")
     */
    protected $imageChecksum = -1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("ImageUrl")
     */
    protected $imageUrl = '';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Target")
     */
    protected $target = 'https://google.com';

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("Type")
     */
    protected $type = 'ExternalLink';

    /**
     * LoginAnnouncementDefinition constructor.
     * @param string $context
     * @param int $id
     * @param int $imageChecksum
     * @param string $imageUrl
     * @param string $target
     * @param string $type
     */
    public function __construct(
        $context = 'NotApplicable',
        $id = 0,
        $imageChecksum = -1,
        $imageUrl = '',
        $target = 'https://google.com',
        $type = 'ExternalLink'
    ) {
        $this->context = $context;
        $this->id = $id;
        $this->imageChecksum = $imageChecksum;
        $this->imageUrl = $imageUrl;
        $this->target = $target;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getImageChecksum()
    {
        return $this->imageChecksum;
    }

    /**
     * @param int $imageChecksum
     */
    public function setImageChecksum($imageChecksum)
    {
        $this->imageChecksum = $imageChecksum;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}