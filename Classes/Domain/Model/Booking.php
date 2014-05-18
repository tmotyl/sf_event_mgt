<?php
namespace SKYFILLERS\SfEventMgt\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Torben Hansen <derhansen@gmail.com>, Skyfillers GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Booking
 */
class Booking extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Firstname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $firstname = '';

	/**
	 * Lastname
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lastname = '';

	/**
	 * Address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * Zip
	 *
	 * @var integer
	 */
	protected $zip = 0;

	/**
	 * City
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * Phone
	 *
	 * @var string
	 */
	protected $phone = '';

	/**
	 * E-Mail
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * gender
	 *
	 * @var string
	 */
	protected $gender = '';

	/**
	 * Confirmed
	 *
	 * @var boolean
	 */
	protected $confirmed = FALSE;

	/**
	 * Paid
	 *
	 * @var boolean
	 */
	protected $paid = FALSE;

	/**
	 * Date of birth
	 *
	 * @var \DateTime
	 */
	protected $dateofbirth = NULL;

	/**
	 * @var \SKYFILLERS\SfEventMgt\Domain\Model\Event
	 */
	protected $event = NULL;

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the zip
	 *
	 * @return integer $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param integer $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the gender
	 *
	 * @return string $gender
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Sets the gender
	 *
	 * @param string $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * Returns the confirmed
	 *
	 * @return boolean $confirmed
	 */
	public function getConfirmed() {
		return $this->confirmed;
	}

	/**
	 * Sets the confirmed
	 *
	 * @param boolean $confirmed
	 * @return void
	 */
	public function setConfirmed($confirmed) {
		$this->confirmed = $confirmed;
	}

	/**
	 * Returns the boolean state of confirmed
	 *
	 * @return boolean
	 */
	public function isConfirmed() {
		return $this->confirmed;
	}

	/**
	 * Returns the paid
	 *
	 * @return boolean $paid
	 */
	public function getPaid() {
		return $this->paid;
	}

	/**
	 * Sets the paid
	 *
	 * @param boolean $paid
	 * @return void
	 */
	public function setPaid($paid) {
		$this->paid = $paid;
	}

	/**
	 * Returns the boolean state of paid
	 *
	 * @return boolean
	 */
	public function isPaid() {
		return $this->paid;
	}

	/**
	 * Returns the dateofbirth
	 *
	 * @return \DateTime $dateofbirth
	 */
	public function getDateofbirth() {
		return $this->dateofbirth;
	}

	/**
	 * Sets the dateofbirth
	 *
	 * @param \DateTime $dateofbirth
	 * @return void
	 */
	public function setDateofbirth(\DateTime $dateofbirth) {
		$this->dateofbirth = $dateofbirth;
	}

	/**
	 * Sets the event
	 *
	 * @param \SKYFILLERS\SfEventMgt\Domain\Model\Event $event
	 */
	public function setEvent($event) {
		$this->event = $event;
	}

	/**
	 * Returns the event
	 *
	 * @return \SKYFILLERS\SfEventMgt\Domain\Model\Event
	 */
	public function getEvent() {
		return $this->event;
	}


}