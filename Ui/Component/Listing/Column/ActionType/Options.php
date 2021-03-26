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
namespace Itonomy\AdminActivity\Ui\Component\Listing\Column\ActionType;

/**
 * Class Options
 * @package Itonomy\AdminActivity\Ui\Component\Listing\Column\ActionType
 */
class Options implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Itonomy\AdminActivity\Helper\Data
     */
    public $helper;

    /**
     * Options constructor.
     * @param \Itonomy\AdminActivity\Helper\Data $helper
     */
    public function __construct(\Itonomy\AdminActivity\Helper\Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * List all option to get in filter
     * @return array
     */
    public function toOptionArray()
    {
        $data = [];
        $lableList = $this->helper->getAllActions();
        foreach ($lableList as $key => $value) {
            $data[] = ['value'=> $key,'label'=> __($value)];
        }
        return $data;
    }
}
