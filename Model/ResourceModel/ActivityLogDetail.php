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
namespace Itonomy\AdminActivity\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ActivityLogDetail
 * @package Itonomy\AdminActivity\Model\ResourceModel
 */
class ActivityLogDetail extends AbstractDb
{

    /**
     * Initialize resource model
     * @return void
     */
    public function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('admin_activity_detail', 'entity_id');
    }
}
