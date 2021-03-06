<?php
namespace DERHANSEN\SfEventMgt\Validation\Validator;

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

use DERHANSEN\SfEventMgt\Domain\Model\Registration;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * RegistrationValidator
 *
 * @author Torben Hansen <derhansen@gmail.com>
 */
class RegistrationValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
{

    /**
     * Configuration Manager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * Object Manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
     * @inject
     */
    protected $objectManager;

    /**
     * Validates the given registration according to required fields set in plugin
     * settings. For boolean fields, the booleanValidator is used and it is assumed,
     * that boolean fields must have the value "TRUE" (for checkboxes)
     *
     * @param Registration $value Registration
     *
     * @return bool
     */
    protected function isValid($value)
    {
        $settings = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'SfEventMgt',
            'Pievent'
        );

        // If no required fields are set, then the registration is valid
        if ($settings['registration']['requiredFields'] === '' ||
            !isset($settings['registration']['requiredFields'])
        ) {
            return true;
        }

        $requiredFields = array_map('trim', explode(',', $settings['registration']['requiredFields']));
        $result = true;

        foreach ($requiredFields as $requiredField) {
            if ($value->_hasProperty($requiredField)) {
                $validator = $this->getValidator(gettype($value->_getProperty($requiredField)), $requiredField);
                /** @var \TYPO3\CMS\Extbase\Error\Result $validationResult */
                $validationResult = $validator->validate($value->_getProperty($requiredField));
                if ($validationResult->hasErrors()) {
                    $result = false;
                    foreach ($validationResult->getErrors() as $error) {
                        $this->result->forProperty($requiredField)->addError($error);
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Returns a validator object depending on the given type of the property
     *
     * @param string $type Type
     * @param string $field The field
     *
     * @return \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
     */
    protected function getValidator($type, $field)
    {
        switch ($type) {
            case 'boolean':
                /** @var \TYPO3\CMS\Extbase\Validation\Validator\BooleanValidator $validator */
                $validator = $this->objectManager->get(
                    'TYPO3\\CMS\\Extbase\\Validation\\Validator\\BooleanValidator',
                    ['is' => true]
                );
                break;
            default:
                if ($field == 'recaptcha') {
                    /** @var \DERHANSEN\SfEventMgt\Validation\Validator\RecaptchaValidator $validator */
                    $validator = $this->objectManager->get('DERHANSEN\\SfEventMgt\\Validation\\Validator\\RecaptchaValidator');
                } else {
                    /** @var \TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator $validator */
                    $validator = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Validation\\Validator\\NotEmptyValidator');
                }
        }
        return $validator;
    }
}