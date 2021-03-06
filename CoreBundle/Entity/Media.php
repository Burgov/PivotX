<?php

namespace PivotX\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PivotX\CoreBundle\Util\Tools;

/**
 * PivotX\CoreBundle\Entity\Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="PivotX\CoreBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Media
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
     * @var text $slug
     *
     * @ORM\Column(name="slug", type="text", length=128, nullable=false)
     */
    private $slug;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var text $reference
     *
     * @ORM\Column(name="reference", type="text", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var text $filename
     *
     * @ORM\Column(name="filename", type="text", length=128, nullable=false)
     */
    private $filename;

    /**
     * @var text $filepath
     *
     * @ORM\Column(name="filepath", type="text", length=1024, nullable=false)
     */
    private $filepath;

    /**
     * @var integer $width
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width;

    /**
     * @var integer $height
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var integer $filesize
     *
     * @ORM\Column(name="filesize", type="integer", nullable=false)
     */
    private $filesize;

    /**
     * @var text $originUrl
     *
     * @ORM\Column(name="origin_url", type="text", length=1024, nullable=true)
     */
    private $originUrl;

    /**
     * @var text $originCreator
     *
     * @ORM\Column(name="origin_creator", type="text", length=100, nullable=true)
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
     * @ORM\ManyToMany(targetEntity="Content", mappedBy="media")
     */
    protected $content;

    

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
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime
     */
    public function getDate()
    {
        return $this->date;
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
     * Set filename
     *
     * @param text $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get filename
     *
     * @return text
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set filepath
     *
     * @param text $filepath
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * Get filepath
     *
     * @return text
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * Set width
     *
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set filesize
     *
     * @param integer $filesize
     */
    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;
    }

    /**
     * Get filesize
     *
     * @return integer
     */
    public function getFilesize()
    {
        return $this->filesize;
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



    public function __construct() {
        
        $this->content = new ArrayCollection();

        $this->date = new \DateTime('now');
    }

    public function __toString() {

        return $this->getSlug();

    }


    /**
     * @ORM\preUpdate
     * @ORM\prePersist
     */
    public function setUpdatedValue()
    {

        // Make sure the path ends in a slash/
        $this->filepath = Tools::addTrailingSlash($this->filepath);

        // Set the slug.
        if ($this->slug == "" ) {
            $fullname = $this->filepath . $this->filename;
            $this->slug = Tools::makeSlug($fullname);
        }

        // Set the reference.
        $this->reference = Tools::makeReference("media", array('slug' => $this->slug, 'id' => $this->id ));

    }



    /**
     * Add content
     *
     * @param PivotX\CoreBundle\Entity\Content $content
     */
    public function addContent(\PivotX\CoreBundle\Entity\Content $content)
    {
        $this->content[] = $content;
    }

    /**
     * Get content
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContent()
    {
        return $this->content;
    }
}