<?php

namespace vnw\Entity\Log;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Log
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $Id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $UserName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $TableName;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $Pk;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ColumnName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $OldValue;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $NewValue;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Creation;
    
    public function exchangeArray($arrayData) {
    	$this->setUserName($arrayData['UserName']);
    	$this->setTableName($arrayData['TableName']);
    	$this->setPk($arrayData['Pk']);
    	$this->setColumnName($arrayData['ColumnName']);
    	$this->setOldValue($arrayData['OldValue']);
    	$this->setNewValue($arrayData['NewValue']);
    	$this->setCreation($arrayData['Creation']);
    }
	/**
	 * @return the $Id
	 */
	public function getId() {
		return $this->Id;
	}

	/**
	 * @return the $UserName
	 */
	public function getUserName() {
		return $this->UserName;
	}

	/**
	 * @return the $TableName
	 */
	public function getTableName() {
		return $this->TableName;
	}

	/**
	 * @return the $Pk
	 */
	public function getPk() {
		return $this->Pk;
	}

	/**
	 * @return the $ColumnName
	 */
	public function getColumnName() {
		return $this->ColumnName;
	}

	/**
	 * @return the $OldValue
	 */
	public function getOldValue() {
		return $this->OldValue;
	}

	/**
	 * @return the $NewValue
	 */
	public function getNewValue() {
		return $this->NewValue;
	}

	/**
	 * @return the $Creation
	 */
	public function getCreation() {
		return $this->Creation;
	}

	/**
	 * @param field_type $Id
	 */
	public function setId($Id) {
		$this->Id = $Id;
	}

	/**
	 * @param field_type $UserName
	 */
	public function setUserName($UserName) {
		$this->UserName = $UserName;
	}

	/**
	 * @param field_type $TableName
	 */
	public function setTableName($TableName) {
		$this->TableName = $TableName;
	}

	/**
	 * @param field_type $Pk
	 */
	public function setPk($Pk) {
		$this->Pk = $Pk;
	}

	/**
	 * @param field_type $ColumnName
	 */
	public function setColumnName($ColumnName) {
		$this->ColumnName = $ColumnName;
	}

	/**
	 * @param field_type $OldValue
	 */
	public function setOldValue($OldValue) {
		$this->OldValue = $OldValue;
	}

	/**
	 * @param field_type $NewValue
	 */
	public function setNewValue($NewValue) {
		$this->NewValue = $NewValue;
	}

	/**
	 * @param field_type $Creation
	 */
	public function setCreation($Creation) {
		$this->Creation = $Creation;
	}

}