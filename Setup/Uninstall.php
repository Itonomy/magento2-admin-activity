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
namespace Itonomy\AdminActivity\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\App\Config\Storage\Writer;
use Itonomy\AdminActivity\Helper\Data as ActivityHelper;

/**
 * Class Uninstall
 * @package Itonomy\AdminActivity\Setup
 */
class Uninstall implements UninstallInterface
{
    /**
     * @var Writer
     */
    public $scope;

    /**
     * Uninstall constructor.
     * @param Writer $scopeWriter
     */
    public function __construct(Writer $scopeWriter)
    {
        $this->scope = $scopeWriter;
    }

    /**
     * Module uninstall code
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $connection = $setup->getConnection();

        $connection->dropTable($connection->getTableName('admin_activity_log'));
        $connection->dropTable($connection->getTableName('admin_activity_detail'));
        $connection->dropTable($connection->getTableName('admin_activity_login_log'));
        $connection->dropTable($connection->getTableName('admin_activity'));
        $setup->endSetup();

        $scope = $this->scope;

        $scope->delete(ActivityHelper::ACTIVITY_ENABLE);
        $scope->delete(ActivityHelper::LOGIN_ACTIVITY_ENABLE);
        $scope->delete(ActivityHelper::PAGE_VISIT_ENABLE);
        $scope->delete(ActivityHelper::CLEAR_LOG_DAYS);
        $scope->delete(ActivityHelper::MODULE_ORDER);
        $scope->delete(ActivityHelper::MODULE_PRODUCT);
        $scope->delete(ActivityHelper::MODULE_CATEGORY);
        $scope->delete(ActivityHelper::MODULE_CUSTOMER);
        $scope->delete(ActivityHelper::MODULE_PROMOTION);
        $scope->delete(ActivityHelper::MODULE_EMAIL);
        $scope->delete(ActivityHelper::MODULE_PAGE);
        $scope->delete(ActivityHelper::MODULE_BLOCK);
        $scope->delete(ActivityHelper::MODULE_WIDGET);
        $scope->delete(ActivityHelper::MODULE_THEME);
        $scope->delete(ActivityHelper::MODULE_SYSTEM_CONFIG);
        $scope->delete(ActivityHelper::MODULE_ATTRIBUTE);
        $scope->delete(ActivityHelper::MODULE_ADMIN_USER);
    }
}
