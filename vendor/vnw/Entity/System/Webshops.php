<?php

namespace vnw\Entity\System;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Webshops extends \vnw\Entity\AbstractObject\AbstractObject
{
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Def;

    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $Name;
}