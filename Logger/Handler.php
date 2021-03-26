<?php
/**
 * Do not edit or add to this file if you wish to upgrade to newer versions in the future.
 * If you wish to customise this module for your needs.
 *
 * @package    Itonomy_AdminActivity
 * @copyright  Copyright (C) 2018 Kiwi Commerce Ltd (https://kiwicommerce.co.uk/)
 * @copyright  Copyright (C) 2021 Itonomy B.V. (https://www.itonomy.nl)
 * @license    https://opensource.org/licenses/OSL-3.0
 */
namespace Itonomy\AdminActivity\Logger;

/**
 * Class Handler
 * @package Itonomy\AdminActivity\Logger
 */
class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level
     * @var int
     */
    public $loggerType = \Itonomy\AdminActivity\Logger\Logger::INFO;

    /**
     * File name
     * @var string
     */
    public $fileName = '/var/log/adminactivity.log';
}
