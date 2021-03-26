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
namespace Itonomy\AdminActivity\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Class LoadAfter
 * @package Itonomy\AdminActivity\Observer
 */
class LoadAfter implements ObserverInterface
{
    /**
     * @var \Itonomy\AdminActivity\Model\Processor
     */
    private $processor;

    /**
     * @var \Itonomy\AdminActivity\Helper\Data
     */
    public $helper;

    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * LoadAfter constructor.
     * @param \Itonomy\AdminActivity\Model\Processor $processor
     * @param \Itonomy\AdminActivity\Helper\Data $helper
     * @param \Itonomy\AdminActivity\Helper\Benchmark $benchmark
     */
    public function __construct(
        \Itonomy\AdminActivity\Model\Processor $processor,
        \Itonomy\AdminActivity\Helper\Data $helper,
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->processor = $processor;
        $this->helper = $helper;
        $this->benchmark = $benchmark;
    }

    /**
     * Delete after
     * @param \Magento\Framework\Event\Observer $observer
     * @return \Magento\Framework\Event\Observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->benchmark->start(__METHOD__);
        if (!$this->helper->isEnable()) {
            return $observer;
        }
        $object = $observer->getEvent()->getObject();
        $this->processor->modelLoadAfter($object);
        $this->benchmark->end(__METHOD__);
    }
}
