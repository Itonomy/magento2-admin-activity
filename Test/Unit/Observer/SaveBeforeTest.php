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
namespace Itonomy\AdminActivity\Test\Unit\Observer;

class SaveBeforeTest extends \PHPUnit\Framework\TestCase
{

    public $saveBefore;

    public $processorMock;

    public $helperMock;

    public $activityRepositoryMock;

    public $observerMock;

    public $eventMock;

    public $objectMock;

    /**
     * @requires PHP 7.0
     */
    public function setUp()
    {
        $this->processorMock = $this->getMockBuilder(\Itonomy\AdminActivity\Model\Processor::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helperMock = $this->getMockBuilder(\Itonomy\AdminActivity\Helper\Data::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->activityRepositoryMock = $this->getMockBuilder(\Itonomy\AdminActivity\Api\ActivityRepositoryInterface::class)
            ->getMock();

        $this->observerMock = $this
            ->getMockBuilder(\Magento\Framework\Event\Observer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->eventMock = $this
            ->getMockBuilder(\Magento\Framework\Event::class)
            ->setMethods(['getObject'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->objectMock = $this
            ->getMockBuilder(\Magento\Framework\DataObject::class)
            ->setMethods(
                [
                    'getId',
                    'setCheckIfIsNew',
                    'getOrigData'
                ]
            )
            ->disableOriginalConstructor()
            ->getMock();

        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->saveBefore = $objectManager->getObject(
            \Itonomy\AdminActivity\Observer\SaveBefore::class,
            [
                'processor' => $this->processorMock,
                'helper' => $this->helperMock,
                'activityRepository' => $this->activityRepositoryMock,
            ]
        );
    }

    /**
     * @requires PHP 7.0
     */
    public function testExecuteIsEnableReturnFalse()
    {
        $this->helperMock->expects($this->once())
            ->method('isEnable')
            ->willReturn(false);

        $this->assertEquals($this->observerMock, $this->saveBefore->execute($this->observerMock));
    }

    /**
     * @requires PHP 7.0
     */
    public function testExecuteGetIdReturnZero()
    {
        $this->helperMock->expects($this->once())
            ->method("isEnable")
            ->willReturn(true);

        $this->observerMock
            ->expects($this->atLeastOnce())
            ->method('getEvent')
            ->willReturn($this->eventMock);

        $this->eventMock
            ->expects($this->atLeastOnce())
            ->method('getObject')
            ->willReturn($this->objectMock);

        $this->objectMock
            ->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn(0);

        $this->objectMock
            ->expects($this->atLeastOnce())
            ->method('setCheckIfIsNew')
            ->with(true)
            ->willReturnSelf();

        $this->assertEquals($this->observerMock, $this->saveBefore->execute($this->observerMock));
    }
}
