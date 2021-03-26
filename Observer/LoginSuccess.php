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
 * Class LoginSuccess
 * @package Itonomy\AdminActivity\Observer
 */
class LoginSuccess implements ObserverInterface
{
    /**
     * @var Helper
     */
    public $helper;

    /**
     * @var \Itonomy\AdminActivity\Api\LoginRepositoryInterface
     */
    public $loginRepository;

    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * LoginSuccess constructor.
     * @param Helper $helper
     * @param \Itonomy\AdminActivity\Api\LoginRepositoryInterface $loginRepository
     * @param \Itonomy\AdminActivity\Helper\Benchmark $benchmark
     */
    public function __construct(
        Helper $helper,
        \Itonomy\AdminActivity\Api\LoginRepositoryInterface $loginRepository,
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->helper = $helper;
        $this->loginRepository = $loginRepository;
        $this->benchmark = $benchmark;
    }
    
    /**
     * Login success
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $this->benchmark->start(__METHOD__);
        if (!$this->helper->isLoginEnable()) {
            return $observer;
        }
        
        $this->loginRepository
            ->setUser($observer->getUser())
            ->addSuccessLog();
        $this->benchmark->end(__METHOD__);
    }
}
