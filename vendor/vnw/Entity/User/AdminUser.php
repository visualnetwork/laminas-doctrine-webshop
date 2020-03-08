<?php

namespace vnw\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class AdminUser extends \vnw\Entity\User\AbstractUser
{
    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $Picture;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Staff;
}