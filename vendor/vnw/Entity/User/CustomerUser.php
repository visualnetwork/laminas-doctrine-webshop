<?php

namespace vnw\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CustomerUser extends \vnw\Entity\User\AbstractUser
{
    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Signed;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;
}