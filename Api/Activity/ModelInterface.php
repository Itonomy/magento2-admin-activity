<?php
/**
 * Do not edit or add to this file if you wish to upgrade to newer versions in the future.
 * If you wish to customize this module for your needs.
 *
 * @package    Itonomy_AdminActivity
 * @copyright  Copyright (C) 2018 Kiwi Commerce Ltd (https://kiwicommerce.co.uk/)
 * @copyright  Copyright (C) 2021 Itonomy B.V. (https://www.itonomy.nl)
 * @license    https://opensource.org/licenses/OSL-3.0
 */
namespace Itonomy\AdminActivity\Api\Activity;

/**
 * Interface ModelInterface
 * @package Itonomy\AdminActivity\Api\Activity
 */
interface ModelInterface
{
    /**
     * Get old data
     * @param $model
     * @return mixed
     */
    public function getOldData($model);

    /**
     * Get edit data
     * @param $model
     * @return mixed
     */
    public function getEditData($model, $fieldArray);
}
