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
namespace Itonomy\AdminActivity\Test\Unit\Helper;

/**
 * Class DataTest
 * @package Itonomy\AdminActivity\Test\Unit\Helper
 */
class DataTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @requires PHP 7.0
     */
    public function setUp()
    {
        $this->context = $this->getMockBuilder(\Magento\Framework\App\Helper\Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->scopeConfig = $this->getMockBuilder(\Magento\Framework\App\Config\ScopeConfigInterface::class)
            ->getMockForAbstractClass();

        $this->scopeConfig->expects($this->any())
            ->method('isSetFlag')
            ->willReturn(true);

        $this->context->expects($this->any())
            ->method('getScopeConfig')
            ->willReturn($this->scopeConfig);

        $this->config = $this->getMockBuilder(\Itonomy\AdminActivity\Model\Config::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helper = new \Itonomy\AdminActivity\Helper\Data(
            $this->context,
            $this->config
        );
    }

    /**
     * @requires PHP 7.0
     */
    public function testIsEnable()
    {
        $this->assertSame(true, $this->helper->isEnable());
    }

    /**
     * @requires PHP 7.0
     */
    public function testIsLoginEnable()
    {
        $this->assertSame(true, $this->helper->isLoginEnable());
    }

    /**
     * @requires PHP 7.0
     */
    public function testIsWildCardModel()
    {
        $notwildcardmethod = \Itonomy\AdminActivity\Helper\Data::isWildCardModel(\Magento\Framework\App\Helper\Context::class);
        $this->assertSame(false, $notwildcardmethod);

        $notwildcardmethod = \Itonomy\AdminActivity\Helper\Data::isWildCardModel(\Magento\Framework\App\Config\Value\Interceptor::class);
        $this->assertSame(true, $notwildcardmethod);
    }
}