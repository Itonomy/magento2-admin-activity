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
namespace Itonomy\AdminActivity\Plugin\App;

/**
 * Class Action
 * @package Itonomy\AdminActivity\Plugin\App
 */
class Action
{
    /**
     * @var \Itonomy\AdminActivity\Model\Processor
     */
    public $processor;

    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * Action constructor.
     * @param \Itonomy\AdminActivity\Model\Processor $processor
     * @param \Itonomy\AdminActivity\Helper\Benchmark $benchmark
     */
    public function __construct(
        \Itonomy\AdminActivity\Model\Processor $processor,
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->processor = $processor;
        $this->benchmark = $benchmark;
    }

    /**
     * Get before dispatch data
     * @param \Magento\Framework\Interception\InterceptorInterface $controller
     * @return void
     */
    public function beforeDispatch(\Magento\Framework\Interception\InterceptorInterface $controller)
    {
        $this->benchmark->start(__METHOD__);
        $actionName = $controller->getRequest()->getActionName();
        $fullActionName = $controller->getRequest()->getFullActionName();

        $this->processor->init($fullActionName, $actionName);
        $this->processor->addPageVisitLog($controller->getRequest()->getModuleName());
        $this->benchmark->end(__METHOD__);
    }
}
