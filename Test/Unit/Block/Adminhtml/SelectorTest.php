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
namespace Itonomy\AdminActivity\Test\Unit\Block\Adminhtml;

/**
 * Class SelectorTest
 * @package Itonomy\AdminActivity\Test\Unit\Block\Adminhtml
 */
class SelectorTest extends \PHPUnit\Framework\TestCase
{
    public $urlBuiler;

    public $revertUrl = 'http://magento.com/adminactivity/activity/revert';

    public $selector;
    /**
     * @requires PHP 7.0
     */
    public function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->urlBuiler = $this->createMock(\Magento\Framework\UrlInterface::class);

        $this->selector = $objectManager->getObject(
            \Itonomy\AdminActivity\Block\Adminhtml\Selector::class,
            [
                '_urlBuilder' => $this->urlBuiler,
            ]
        );
    }
    /**
     * @requires PHP 7.0
     */
    public function testGetRevertUrl()
    {
        $this->urlBuiler->expects($this->once())
            ->method('getUrl')
            ->with('adminactivity/activity/revert')
            ->willReturn($this->revertUrl);

        $this->assertEquals($this->revertUrl, $this->selector->getRevertUrl());
    }
}