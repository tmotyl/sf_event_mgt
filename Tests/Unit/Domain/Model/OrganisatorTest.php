<?php

namespace DERHANSEN\SfEventMgt\Tests\Unit\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case for class \DERHANSEN\SfEventMgt\Domain\Model\Organisator.
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class OrganisatorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * Organisator object
	 *
	 * @var \DERHANSEN\SfEventMgt\Domain\Model\Organisator
	 */
	protected $subject = NULL;

	/**
	 * Setup
	 *
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \DERHANSEN\SfEventMgt\Domain\Model\Organisator();
	}

	/**
	 * Teardown
	 *
	 * @return void
	 */
	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * Test if initial value for name is returned
	 *
	 * @test
	 * @return void
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * Test if name can be set
	 *
	 * @test
	 * @return void
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * Test if initial value for email is returned
	 *
	 * @test
	 * @return void
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * Test if email can be set
	 *
	 * @test
	 * @return void
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('mail@domain.tld');

		$this->assertAttributeEquals(
			'mail@domain.tld',
			'email',
			$this->subject
		);
	}

	/**
	 * Test if initial value for phone is returned
	 *
	 * @test
	 * @return void
	 */
	public function getPhoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * Test if email can be set
	 *
	 * @test
	 * @return void
	 */
	public function setPhoneForStringSetsPhone() {
		$this->subject->setPhone('+49 123 4567890');

		$this->assertAttributeEquals(
			'+49 123 4567890',
			'phone',
			$this->subject
		);
	}

	/**
	 * Test if initial value for image is returned
	 *
	 * @test
	 * @return void
	 */
	public function getImageReturnsInitialValueForfiles() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getImage()
		);
	}

	/**
	 * Test if image can be set
	 *
	 * @test
	 * @return void
	 */
	public function setImageForObjectStorageContainingImageSetsImage() {
		$file = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$objectStorageHoldingExactlyOneFile = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFile->attach($file);
		$this->subject->setImage($objectStorageHoldingExactlyOneFile);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFile,
			'image',
			$this->subject
		);
	}

	/**
	 * Test if image can be attached
	 *
	 * @test
	 * @return void
	 */
	public function addImageToObjectStorageHoldingImages() {
		$images = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$imageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage',
			array('attach'), array(), '', FALSE);
		$imageObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($images));
		$this->inject($this->subject, 'image', $imageObjectStorageMock);
		$this->subject->addImage($images);
	}

	/**
	 * Test if image can be removed
	 *
	 * @test
	 * @return void
	 */
	public function removeImageFromObjectStorageHoldingImages() {
		$images = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$imageObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage',
			array('detach'), array(), '', FALSE);
		$imageObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($images));
		$this->inject($this->subject, 'image', $imageObjectStorageMock);
		$this->subject->removeImage($images);
	}

}