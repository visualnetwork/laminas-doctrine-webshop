<?php

namespace vnw\Entity\AbstractObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class AbstractObject
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Active;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastModified;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Creation;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Deleted;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @ORM\Version
     */
    private $Version;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $isDeletable;

    /**
     * @ORM\ManyToOne(targetEntity="vnw\Entity\User\AbstractUser")
     * @ORM\JoinColumn(name="CreatorId", referencedColumnName="Id", nullable=false)
     */
    private $Creator;

    /**
     * @ORM\PreUpdate
     */
    public function onUpdate()
    {
    }

    /**
     * @ORM\PrePersist
     */
    public function onPersist()
    {
    }
    
    public function getCreator() {
    	return $this->Creator;
    }
    
    public function getId() {
    	return $this->Id;
    }
    
}