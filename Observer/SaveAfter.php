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
use \Itonomy\AdminActivity\Helper\Data as Helper;

/**
 * Class SaveAfter
 * @package Itonomy\AdminActivity\Observer
 */
class SaveAfter implements ObserverInterface
{
    /**
     * @var string
     */
    const ACTION_MASSCANCEL = 'massCancel';

    /**
     * @var string
     */
    const SYSTEM_CONFIG = 'adminhtml_system_config_save';

    /**
     * @var \Itonomy\AdminActivity\Model\Processor
     */
    private $processor;

    /**
     * @var Helper
     */
    public $helper;

    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * SaveAfter constructor.
     * @param \Itonomy\AdminActivity\Model\Processor $processor
     * @param Helper $helper
     * @param \Itonomy\AdminActivity\Helper\Benchmark $benchmark
     */
    public function __construct(
        \Itonomy\AdminActivity\Model\Processor $processor,
        Helper $helper,
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->processor = $processor;
        $this->helper = $helper;
        $this->benchmark = $benchmark;
    }

    /**
     * Save after
     * @param \Magento\Framework\Event\Observer $observer
     * @return \Magento\Framework\Event\Observer|boolean
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->benchmark->start(__METHOD__);

        if (!$this->helper->isEnable()) {
            return $observer;
        }
        $object = $observer->getEvent()->getObject();
        if ($object->getCheckIfIsNew()) {
            if ($this->processor->initAction==self::SYSTEM_CONFIG) {
                $this->processor->modelEditAfter($object);
            }
            $this->processor->modelAddAfter($object);
        } else {
            if ($this->processor->validate($object)) {
                if ($this->processor->eventConfig['action']==self::ACTION_MASSCANCEL) {
                    $this->processor->modelDeleteAfter($object);
                }
                $this->processor->modelEditAfter($object);
            }
        }
        $this->benchmark->end(__METHOD__);
        return true;
    }
}
