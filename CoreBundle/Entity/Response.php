<?php

namespace PivotX\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PivotX\CoreBundle\Util\Tools;


/**
 * PivotX\CoreBundle\Entity\Response
 *
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="PivotX\CoreBundle\Repository\ResponseRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Response
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
     * @var text $reference
     *
     * @ORM\Column(name="reference", type="text", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var text $responseType
     *
     * @ORM\Column(name="response_type", type="text", length=1024, nullable=false)
     */
    private $responseType;

    /**
     * @var text $title
     *
     * @ORM\Column(name="title", type="text", length=255, nullable=true)
     */
    private $title;

    /**
     * @var text $body
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var text $name
     *
     * @ORM\Column(name="name", type="text", length=255, nullable=false)
     */
    private $name;

    /**
     * @var text $email
     *
     * @ORM\Column(name="email", type="text", length=255, nullable=true)
     */
    private $email;

    /**
     * @var text $url
     *
     * @ORM\Column(name="url", type="text", length=1024, nullable=true)
     */
    private $url;

    /**
     * @var text $ip
     *
     * @ORM\Column(name="ip", type="text", length=128, nullable=false)
     */
    private $ip;

    /**
     * @var datetime $dateCreated
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var text $status
     *
     * @ORM\Column(name="status", type="text", length=255, nullable=false)
     */
    private $status;

    /**
     * @var text $originUrl
     *
     * @ORM\Column(name="origin_url", type="text", length=1024, nullable=true)
     */
    private $originUrl;

    /**
     * @var text $originCreator
     *
     * @ORM\Column(name="origin_creator", type="text", length=255, nullable=true)
     */
    private $originCreator;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var Content
     *
     * @ORM\ManyToOne(targetEntity="Content")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="content_id", referencedColumnName="id")
     * })
     */
    private $content;



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
     * Set responseType
     *
     * @param text $responseType
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;
    }

    /**
     * Get responseType
     *
     * @return text
     */
    public function getResponseType()
    {
        return $this->responseType;
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
     * Set name
     *
     * @param text $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return text
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param text $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return text
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set url
     *
     * @param text $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return text
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ip
     *
     * @param text $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get ip
     *
     * @return text
     */
    public function getIp()
    {
        return $this->ip;
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
     * Set originUrl
     *
     * @param text $originUrl
     */
    public function setOriginUrl($originUrl)
    {
        $this->originUrl = $originUrl;
    }

    /**
     * Get originUrl
     *
     * @return text
     */
    public function getOriginUrl()
    {
        return $this->originUrl;
    }

    /**
     * Set originCreator
     *
     * @param text $originCreator
     */
    public function setOriginCreator($originCreator)
    {
        $this->originCreator = $originCreator;
    }

    /**
     * Get originCreator
     *
     * @return text
     */
    public function getOriginCreator()
    {
        return $this->originCreator;
    }

    /**
     * Set user
     *
     * @param PivotX\CoreBundle\Entity\User $user
     */
    public function setUser(\PivotX\CoreBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return PivotX\CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set content
     *
     * @param PivotX\CoreBundle\Entity\Content $content
     */
    public function setContent(\PivotX\CoreBundle\Entity\Content $content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return PivotX\CoreBundle\Entity\Content
     */
    public function getContent()
    {
        return $this->content;
    }


    public function __toString() {

        return $this->getId();

    }




    public function __construct() {
        $this->dateCreated = new \DateTime('now');
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }


    /**
     * @ORM\preUpdate
     * @ORM\prePersist
     */
    public function setUpdatedValue()
    {

        if (empty($this->status)) {
            $this->status = "neutral";
        }


        // Set the reference.
        $this->reference = Tools::makeReference("response", array(
            'type' => $this->getResponsetype(),
            'name' => $this->name,
            'date' => $this->dateCreated,
            'id' => $this->id
        ));

    }


}