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

namespace Itonomy\AdminActivity\Block\Adminhtml\System\Config\Fieldset;

use \Magento\Backend\Block\Template;
use \Magento\Framework\Data\Form\Element\Renderer\RendererInterface;

/**
 * Class Hint
 * @package Itonomy\AdminActivity\Block\Adminhtml\System\Config\Fieldset
 */
class Hint extends Template implements RendererInterface
{
    /**
     * @var \Magento\Framework\Module\ModuleList
     */
    private $moduleList;

    /**
     * Class constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Module\ModuleList $moduleList
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Framework\Module\ModuleList $moduleList,
        array $data = []
    ) {
        $this->_template = 'Itonomy_AdminActivity::system/config/fieldset/hint.phtml';
        parent::__construct($context, $data);
        $this->moduleList = $moduleList;
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $_element = $element;
        return $this->toHtml();
    }

    /**
     * @return mixed
     */
    public function getModuleVersion()
    {
        return $this->moduleList->getOne('Itonomy_AdminActivity')['setup_version'];
    }
}
