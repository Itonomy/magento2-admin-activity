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
namespace Itonomy\AdminActivity\Api\Data;

/**
 * Interface LogSearchResultsInterface
 * @package Itonomy\EnhancedSMTP\Api\Data
 */
interface ActivitySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get admin activity list.
     * @api
     * @return \Itonomy\AdminActivity\Model\Activity[]
     */
    public function getItems();

    /**
     * Set admin activity list.
     * @api
     * @param \Itonomy\AdminActivity\Model\Activity[] $items
     * @return $this
     */
    public function setItems(array $items);
}
