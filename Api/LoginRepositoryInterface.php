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
namespace Itonomy\AdminActivity\Api;

/**
 * Interface LoginRepositoryInterface
 * @package Itonomy\AdminActivity\Api
 */
interface LoginRepositoryInterface
{
    /**
     * Set login data
     * @param $status
     * @param $type
     * @return mixed
     */
    public function addLog($status, $type);

    /**
     * Get all admin activity data before date
     * @param $endDate
     * @return mixed
     */
    public function getListBeforeDate($endDate);

    /**
     * Set login user
     * @param $user
     * @return mixed
     */
    public function setUser($user);
}
