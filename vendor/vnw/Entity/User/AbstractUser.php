<?php

namespace vnw\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="Admin", type="smallint")
 * @ORM\DiscriminatorMap({"0":"vnw\Entity\User\AbstractUser","1":"vnw\Entity\User\AdminUser","2":"vnw\Entity\User\CustomerUser"})
 */
class AbstractUser extends \vnw\Entity\AbstractObject\AbstractObject
{
    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $Name;

    /**
     * @ORM\Column(type="text", length=50, nullable=true)
     */
    private $Phone;

    /**
     * @ORM\Column(type="text", length=50, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $Password;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastLogin;

    /**
     * @ORM\ManyToOne(targetEntity="vnw\Entity\User\UsersType")
     * @ORM\JoinColumn(name="UsersTypeId", referencedColumnName="Id", nullable=false)
     */
    private $UsersType;

    /**
     * @ORM\ManyToOne(targetEntity="vnw\Entity\Internationalization\Languages")
     * @ORM\JoinColumn(name="LanguageId", referencedColumnName="Id")
     */
    private $Language;
    
    public function getName() {
    	return $this->Name;
    }
}