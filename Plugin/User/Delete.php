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
namespace Itonomy\AdminActivity\Plugin\User;

/**
 * Class Delete
 * @package Itonomy\AdminActivity\Plugin\User
 */
class Delete
{
    /**
     * @var \Itonomy\AdminActivity\Helper\Benchmark
     */
    public $benchmark;

    /**
     * Delete constructor.
     * @param \Itonomy\AdminActivity\Helper\Benchmark $benchmark
     */
    public function __construct(
        \Itonomy\AdminActivity\Helper\Benchmark $benchmark
    ) {
        $this->benchmark = $benchmark;
    }
    /**
     * @param \Magento\User\Model\ResourceModel\User $user
     * @param callable $proceed
     * @param $object
     * @return mixed
     */
    public function aroundDelete(\Magento\User\Model\ResourceModel\User $user, callable $proceed, $object)
    {
        $this->benchmark->start(__METHOD__);
        $object->load($object->getId());

        $result = $proceed($object);
        $object->afterDelete();

        $this->benchmark->end(__METHOD__);
        return $result;
    }
}
