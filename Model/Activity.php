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
namespace Itonomy\AdminActivity\Model;

use \Magento\Framework\Model\AbstractModel;

/**
 * Class Activity
 * @package Itonomy\Activity\Model
 */
class Activity extends AbstractModel
{
    /**
     * @var string
     */
    const ACTIVITY_ID = 'entity_id'; // We define the id field name

    /**
     * Initialize resource model
     * @return void
     */
    public function _construct()
    {
        $this->_init('Itonomy\AdminActivity\Model\ResourceModel\Activity');
    }
}
