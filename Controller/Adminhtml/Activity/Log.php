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
namespace Itonomy\AdminActivity\Controller\Adminhtml\Activity;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;

/**
 * Class Log
 * @package Itonomy\AdminActivity\Controller\Adminhtml\Activity
 */
class Log extends Action
{
    /**
     * @var \Magento\Framework\Controller\Result\RawFactory
     */
    public $resultRawFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    public $layoutFactory;

    /**
     * Log constructor.
     * @param Context $context
     * @param \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory
    ) {
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;

        parent::__construct($context);
    }

    /**
     * view action
     * @return $this
     */
    public function execute()
    {
        $content = $this->layoutFactory->create()
            ->createBlock(
                \Itonomy\AdminActivity\Block\Adminhtml\ActivityLogListing::class
            );

        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->resultRawFactory->create();
        return $resultRaw->setContents($content->toHtml());
    }
}
