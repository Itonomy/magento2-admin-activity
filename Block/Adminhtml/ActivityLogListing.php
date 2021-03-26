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
namespace Itonomy\AdminActivity\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Itonomy\AdminActivity\Api\ActivityRepositoryInterface;
use Itonomy\AdminActivity\Helper\Browser;

/**
 * Class ActivityLogListing
 * @package Itonomy\AdminActivity\Block\Adminhtml
 */
class ActivityLogListing extends Template
{
    /**
     * @var ActivityRepositoryInterface
     */
    public $activityRepository;

    /**
     * @var Browser
     */
    public $browser;

    /**
     * Path to template file in theme.
     * @var string
     */
    public $_template = 'Itonomy_AdminActivity::log_listing.phtml';

    /**
     * ActivityLogListing constructor.
     * @param Template\Context $context
     * @param ActivityRepositoryInterface $activityRepository
     * @param Browser $browser
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        ActivityRepositoryInterface $activityRepository,
        Browser $browser
    ) {
        $this->activityRepository = $activityRepository;
        $this->browser = $browser;
        parent::__construct($context);
    }

    /**
     * Get admin activity log listing
     * @return array
     */
    public function getLogListing()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->activityRepository->getActivityLog($id);
        return $data->getData();
    }

    /**
     * Get admin activity details
     * @return array
     */
    public function getAdminDetails()
    {
        $id = $this->getRequest()->getParam('id');
        $activity = $this->activityRepository->getActivityById($id);

        $this->browser->reset();
        $this->browser->setUserAgent($activity->getUserAgent());
        $browser = $this->browser->__toString();

        $logData = [];
        $logData['username'] = $activity->getUsername();
        $logData['module'] = $activity->getModule();
        $logData['name'] = $activity->getName();
        $logData['fullaction'] = $activity->getFullaction();
        $logData['browser'] = $browser;
        $logData['date'] = $activity->getUpdatedAt();
        return $logData;
    }
}
