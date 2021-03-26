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
use Itonomy\AdminActivity\Api\ActivityRepositoryInterface;

/**
 * Class SaveBefore
 * @package Itonomy\AdminActivity\Observer
 */
class SaveBefore implements ObserverInterface
{
    /**
     * @var Helper
     */
    public $helper;

    /**
     * @var \Itonomy\AdminActivity\Model\Processor
     */
    public $processor;

    /**
     * @var ActivityRepositoryInterface
     */
    public $activityRepository;

    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * SaveBefore constructor.
     * @param Helper $helper
     * @param \Itonomy\AdminActivity\Model\Processor $processor
     * @param ActivityRepositoryInterface $activityRepository
     * @param \Itonomy\AdminActivity\Helper\Benchmark $banchmark
     */
    public function __construct(
        Helper $helper,
        \Itonomy\AdminActivity\Model\Processor $processor,
        ActivityRepositoryInterface $activityRepository,
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->helper = $helper;
        $this->processor = $processor;
        $this->activityRepository = $activityRepository;
        $this->benchmark = $benchmark;
    }

    /**
     * Save before
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
        if ($object->getId() == 0) {
            $object->setCheckIfIsNew(true);
        } else {
            $object->setCheckIfIsNew(false);
            if ($this->processor->validate($object)) {
                $origData = $object->getOrigData();
                if (!empty($origData)) {
                    return $observer;
                }
                $data = $this->activityRepository->getOldData($object);
                foreach ($data->getData() as $key => $value) {
                    $object->setOrigData($key, $value);
                }
            }
        }
        $this->benchmark->end(__METHOD__);
        return $observer;
    }
}
