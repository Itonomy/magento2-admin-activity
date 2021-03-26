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
namespace Itonomy\AdminActivity\Block\Adminhtml;

/**
 * Class Selector
 * @package Itonomy\AdminActivity\Block\Adminhtml
 */
class Selector extends \Magento\Backend\Block\Template
{
    /**
     * Revert Activity Log action URL
     * @return string
     */
    public function getRevertUrl()
    {
        return $this->getUrl('adminactivity/activity/revert');
    }
}
