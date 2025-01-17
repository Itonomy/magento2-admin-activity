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
 * Class TrackFieldTest
 * @package Itonomy\AdminActivity\Test\Unit\Helper
 */
class TrackFieldTest extends \PHPUnit\Framework\TestCase
{
    public $helper;

    public $product;

    public $sampleProduct = [
        'name' => 'Test Product',
        'sku' => 'TEST-PRO1',
        'price' => 99.99
    ];

    /**
     * @requires PHP 7.0
     */
    public function setUp()
    {
        $context = $this->getMockBuilder(\Magento\Framework\App\Helper\Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $systemConfig = $this->getMockBuilder(\Itonomy\AdminActivity\Model\Activity\SystemConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $themeConfig = $this->getMockBuilder(\Itonomy\AdminActivity\Model\Activity\ThemeConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helper = new \Itonomy\AdminActivity\Helper\TrackField(
            $context,
            $systemConfig,
            $themeConfig
        );

        $this->product = $this->getMockBuilder(\Magento\Catalog\Model\Product::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->product->expects($this->any())
            ->method('getData')
            ->willReturn($this->sampleProduct);
    }

    /**
     * @requires PHP 7.0
     * @dataProvider collectFieldDataMethods
     */
    public function testGetFields($method)
    {
        $this->assertNotEmpty($this->helper->getFields($method));
        $this->assertGreaterThanOrEqual(1, $this->helper->getFields($method));
    }

    public function collectFieldDataMethods()
    {
        return [
            'Category'  => ['getCategoryFieldData'],
            'Product' => ['getProductFieldData'],
            'Customer Group' => ['getCustomerGroupFieldData'],
            'Customer' => ['getCustomerFieldData'],
            'Catalog Promotion' => ['getCatalogPromotionFieldData'],
            'Cart Promotion' => ['getCartPromotionFieldData'],
            'Email' => ['getEmailFieldData'],
            'Page' => ['getPageFieldData'],
            'Block' => ['getBlockFieldData'],
            'Widget' => ['getWidgetFieldData'],
            'Admin User' => ['getAdminUserFieldData'],
            'Order' => ['getOrderFieldData'],
            'Product Attribute' => ['getAttributeFieldData'],
        ];
    }

    /**
     * @requires PHP 7.0
     */
    public function testGetAddData()
    {
        $result = $this->helper->getAddData($this->product, 'getProductFieldData');

        $this->assertNotEmpty($result);
        $this->assertCount(3, $result);
    }

    /**
     * @requires PHP 7.0
     */
    public function testGetDeleteData()
    {
        $result = $this->helper->getDeleteData($this->product, 'getProductFieldData');

        $this->assertEmpty($result);
    }
}
