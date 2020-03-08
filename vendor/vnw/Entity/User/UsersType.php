<?php

namespace vnw\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UsersType extends \vnw\Entity\AbstractObject\AbstractObject
{
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Admin;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $Sn;

    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $Name;
    
    public function setName($name) {
    	$this->Name=$name;
    }
    
    public function getName() {
    	return $this->Name;
    }
}