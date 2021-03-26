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
namespace Itonomy\AdminActivity\Model\ResourceModel\Login;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Itonomy\AdminActivity\Model\ResourceModel\Login
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            'Itonomy\AdminActivity\Model\Login',
            'Itonomy\AdminActivity\Model\ResourceModel\Login'
        );
    }
}
