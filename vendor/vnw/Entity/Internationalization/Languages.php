<?php

namespace vnw\Entity\Internationalization;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Languages extends \vnw\Entity\AbstractObject\AbstractObject
{
    /**
     * @ORM\Column(type="text", length=50, nullable=true)
     */
    private $Name;

    /**
     * @ORM\Column(type="text", length=2, nullable=true)
     */
    private $ShortCode;

    /**
     * @ORM\Column(type="text", length=3, nullable=true)
     */
    private $LongCode;

    /**
     * @ORM\Column(type="text", length=10, nullable=true)
     */
    private $WebCode;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $Def;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Sn;

    /**
     * @ORM\Column(type="text", length=50, nullable=true)
     */
    private $DateFormatShort;

    /**
     * @ORM\Column(type="text", length=50, nullable=true)
     */
    private $DateFormatLong;

    /**
     * @ORM\Column(type="text", length=250, nullable=true)
     */
    private $Picture;
}