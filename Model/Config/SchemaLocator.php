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
namespace Itonomy\AdminActivity\Model\Config;

use Magento\Framework\Config\SchemaLocatorInterface;
use Magento\Framework\Module\Dir;

/**
 * Class SchemaLocator
 * @package Itonomy\AdminActivity\Model\Config
 */
class SchemaLocator implements SchemaLocatorInterface
{
    /**
     * XML schema for config file.
     */
    const CONFIG_FILE_SCHEMA = 'adminactivity.xsd';

    /**
     * Path to corresponding XSD file with validation rules for merged config
     * @var string
     */
    public $schema = null;

    /**
     * Path to corresponding XSD file with validation rules for separate config files
     * @var string
     */
    public $perFileSchema = null;

    /**
     * SchemaLocator constructor.
     * @param Dir\Reader $moduleReader
     */
    public function __construct(\Magento\Framework\Module\Dir\Reader $moduleReader)
    {
        $configDir = $moduleReader->getModuleDir(Dir::MODULE_ETC_DIR, 'Itonomy_AdminActivity');
        $this->schema = $configDir . DIRECTORY_SEPARATOR . self::CONFIG_FILE_SCHEMA;
        $this->perFileSchema = $configDir . DIRECTORY_SEPARATOR . self::CONFIG_FILE_SCHEMA;
    }

    /**
     * Get schema
     * @return string
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * Get file schema
     * @return string
     */
    public function getPerFileSchema()
    {
        return $this->perFileSchema;
    }
}
