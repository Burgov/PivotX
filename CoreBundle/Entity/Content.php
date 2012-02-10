<?php

namespace PivotX\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PivotX\CoreBundle\Entity\Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity
 */
class Content
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $contenttypeId
     *
     * @ORM\Column(name="contenttype_id", type="integer", nullable=false)
     */
    private $contenttypeId;

    /**
     * @var integer $userId
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var text $slug
     *
     * @ORM\Column(name="slug", type="text", nullable=false)
     */
    private $slug;

    /**
     * @var text $reference
     *
     * @ORM\Column(name="reference", type="text", nullable=false)
     */
    private $reference;

    /**
     * @var text $grouping
     *
     * @ORM\Column(name="grouping", type="text", nullable=false)
     */
    private $grouping;

    /**
     * @var text $title
     *
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    private $title;

    /**
     * @var text $teaser
     *
     * @ORM\Column(name="teaser", type="text", nullable=false)
     */
    private $teaser;

    /**
     * @var text $body
     *
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var datetime $dateCreated
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var datetime $dateModified
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;

    /**
     * @var datetime $datePublished
     *
     * @ORM\Column(name="date_published", type="datetime", nullable=false)
     */
    private $datePublished;

    /**
     * @var datetime $dateDepublished
     *
     * @ORM\Column(name="date_depublished", type="datetime", nullable=false)
     */
    private $dateDepublished;

    /**
     * @var datetime $datePublishOn
     *
     * @ORM\Column(name="date_publish_on", type="datetime", nullable=false)
     */
    private $datePublishOn;

    /**
     * @var datetime $dateDepublishOn
     *
     * @ORM\Column(name="date_depublish_on", type="datetime", nullable=false)
     */
    private $dateDepublishOn;

    /**
     * @var text $language
     *
     * @ORM\Column(name="language", type="text", nullable=false)
     */
    private $language;

    /**
     * @var integer $version
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var text $status
     *
     * @ORM\Column(name="status", type="text", nullable=false)
     */
    private $status;

    /**
     * @var boolean $searchable
     *
     * @ORM\Column(name="searchable", type="boolean", nullable=false)
     */
    private $searchable;

    /**
     * @var boolean $locked
     *
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    private $locked;

    /**
     * @var integer $originUrl
     *
     * @ORM\Column(name="origin_url", type="integer", nullable=false)
     */
    private $originUrl;

    /**
     * @var integer $originCreator
     *
     * @ORM\Column(name="origin_creator", type="integer", nullable=false)
     */
    private $originCreator;

    /**
     * @var text $textFormat
     *
     * @ORM\Column(name="text_format", type="text", nullable=false)
     */
    private $textFormat;

    /**
     * @var boolean $allowResponses
     *
     * @ORM\Column(name="allow_responses", type="boolean", nullable=false)
     */
    private $allowResponses;



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
     * Set contenttypeId
     *
     * @param integer $contenttypeId
     */
    public function setContenttypeId($contenttypeId)
    {
        $this->contenttypeId = $contenttypeId;
    }

    /**
     * Get contenttypeId
     *
     * @return integer 
     */
    public function getContenttypeId()
    {
        return $this->contenttypeId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set slug
     *
     * @param text $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return text 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set reference
     *
     * @param text $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return text 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set grouping
     *
     * @param text $grouping
     */
    public function setGrouping($grouping)
    {
        $this->grouping = $grouping;
    }

    /**
     * Get grouping
     *
     * @return text 
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * Set title
     *
     * @param text $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return text 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set teaser
     *
     * @param text $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Get teaser
     *
     * @return text 
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set dateCreated
     *
     * @param datetime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * Get dateCreated
     *
     * @return datetime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateModified
     *
     * @param datetime $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * Get dateModified
     *
     * @return datetime 
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set datePublished
     *
     * @param datetime $datePublished
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;
    }

    /**
     * Get datePublished
     *
     * @return datetime 
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Set dateDepublished
     *
     * @param datetime $dateDepublished
     */
    public function setDateDepublished($dateDepublished)
    {
        $this->dateDepublished = $dateDepublished;
    }

    /**
     * Get dateDepublished
     *
     * @return datetime 
     */
    public function getDateDepublished()
    {
        return $this->dateDepublished;
    }

    /**
     * Set datePublishOn
     *
     * @param datetime $datePublishOn
     */
    public function setDatePublishOn($datePublishOn)
    {
        $this->datePublishOn = $datePublishOn;
    }

    /**
     * Get datePublishOn
     *
     * @return datetime 
     */
    public function getDatePublishOn()
    {
        return $this->datePublishOn;
    }

    /**
     * Set dateDepublishOn
     *
     * @param datetime $dateDepublishOn
     */
    public function setDateDepublishOn($dateDepublishOn)
    {
        $this->dateDepublishOn = $dateDepublishOn;
    }

    /**
     * Get dateDepublishOn
     *
     * @return datetime 
     */
    public function getDateDepublishOn()
    {
        return $this->dateDepublishOn;
    }

    /**
     * Set language
     *
     * @param text $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get language
     *
     * @return text 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set version
     *
     * @param integer $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set status
     *
     * @param text $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return text 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set searchable
     *
     * @param boolean $searchable
     */
    public function setSearchable($searchable)
    {
        $this->searchable = $searchable;
    }

    /**
     * Get searchable
     *
     * @return boolean 
     */
    public function getSearchable()
    {
        return $this->searchable;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set originUrl
     *
     * @param integer $originUrl
     */
    public function setOriginUrl($originUrl)
    {
        $this->originUrl = $originUrl;
    }

    /**
     * Get originUrl
     *
     * @return integer 
     */
    public function getOriginUrl()
    {
        return $this->originUrl;
    }

    /**
     * Set originCreator
     *
     * @param integer $originCreator
     */
    public function setOriginCreator($originCreator)
    {
        $this->originCreator = $originCreator;
    }

    /**
     * Get originCreator
     *
     * @return integer 
     */
    public function getOriginCreator()
    {
        return $this->originCreator;
    }

    /**
     * Set textFormat
     *
     * @param text $textFormat
     */
    public function setTextFormat($textFormat)
    {
        $this->textFormat = $textFormat;
    }

    /**
     * Get textFormat
     *
     * @return text 
     */
    public function getTextFormat()
    {
        return $this->textFormat;
    }

    /**
     * Set allowResponses
     *
     * @param boolean $allowResponses
     */
    public function setAllowResponses($allowResponses)
    {
        $this->allowResponses = $allowResponses;
    }

    /**
     * Get allowResponses
     *
     * @return boolean 
     */
    public function getAllowResponses()
    {
        return $this->allowResponses;
    }
}