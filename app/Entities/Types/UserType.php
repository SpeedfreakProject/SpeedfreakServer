<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Types;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UserType
 * @package Speedfreak\Entities\Types
 *
 * @Serializer\AccessorOrder("custom", custom={"address1", "address2", "country", "dateCreated", "dob", "email",
"emailStatus", "firstName", "fullGameAccess", "gender", "idDigits", "isComplete", "landlinePhone", "language",
"lastAuthDate", "lastName", "mobile", "nickname", "postalCode", "realName", "reasonCode", "remoteUserId",
"securityToken", "starterPackEntitlementTag", "status", "subscribeMsg", "tosVersion", "userId", "username"})
 */
class UserType
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $address1;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $address2;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $country;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $dateCreated;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $dob;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $email;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $emailStatus;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $firstName;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="fullGameAccess")
     */
    private $fullGameAccess;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $gender;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $idDigits;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="isComplete")
     */
    private $isComplete;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $landlinePhone;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $language;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $lastAuthDate;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $lastName;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $mobile;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $nickname;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $postalCode;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $realName;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $reasonCode;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="remoteUserId")
     */
    private $remoteUserId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="securityToken")
     */
    private $securityToken;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $starterPackEntitlementTag;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $status;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="subscribeMsg")
     */
    private $subscribeMsg;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $tosVersion;

    /**
     * @var int
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName(value="userId")
     */
    private $userId;

    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
     */
    private $username;

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param string $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmailStatus()
    {
        return $this->emailStatus;
    }

    /**
     * @param string $emailStatus
     */
    public function setEmailStatus($emailStatus)
    {
        $this->emailStatus = $emailStatus;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFullGameAccess()
    {
        return $this->fullGameAccess;
    }

    /**
     * @param string $fullGameAccess
     */
    public function setFullGameAccess($fullGameAccess)
    {
        $this->fullGameAccess = $fullGameAccess;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getIdDigits()
    {
        return $this->idDigits;
    }

    /**
     * @param string $idDigits
     */
    public function setIdDigits($idDigits)
    {
        $this->idDigits = $idDigits;
    }

    /**
     * @return string
     */
    public function getIsComplete()
    {
        return $this->isComplete;
    }

    /**
     * @param string $isComplete
     */
    public function setIsComplete($isComplete)
    {
        $this->isComplete = $isComplete;
    }

    /**
     * @return string
     */
    public function getLandlinePhone()
    {
        return $this->landlinePhone;
    }

    /**
     * @param string $landlinePhone
     */
    public function setLandlinePhone($landlinePhone)
    {
        $this->landlinePhone = $landlinePhone;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLastAuthDate()
    {
        return $this->lastAuthDate;
    }

    /**
     * @param string $lastAuthDate
     */
    public function setLastAuthDate($lastAuthDate)
    {
        $this->lastAuthDate = $lastAuthDate;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param string $reasonCode
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
    }

    /**
     * @return int
     */
    public function getRemoteUserId()
    {
        return $this->remoteUserId;
    }

    /**
     * @param int $remoteUserId
     */
    public function setRemoteUserId($remoteUserId)
    {
        $this->remoteUserId = $remoteUserId;
    }

    /**
     * @return string
     */
    public function getSecurityToken()
    {
        return $this->securityToken;
    }

    /**
     * @param string $securityToken
     */
    public function setSecurityToken($securityToken)
    {
        $this->securityToken = $securityToken;
    }

    /**
     * @return string
     */
    public function getStarterPackEntitlementTag()
    {
        return $this->starterPackEntitlementTag;
    }

    /**
     * @param string $starterPackEntitlementTag
     */
    public function setStarterPackEntitlementTag($starterPackEntitlementTag)
    {
        $this->starterPackEntitlementTag = $starterPackEntitlementTag;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSubscribeMsg()
    {
        return $this->subscribeMsg;
    }

    /**
     * @param string $subscribeMsg
     */
    public function setSubscribeMsg($subscribeMsg)
    {
        $this->subscribeMsg = $subscribeMsg;
    }

    /**
     * @return string
     */
    public function getTosVersion()
    {
        return $this->tosVersion;
    }

    /**
     * @param string $tosVersion
     */
    public function setTosVersion($tosVersion)
    {
        $this->tosVersion = $tosVersion;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}