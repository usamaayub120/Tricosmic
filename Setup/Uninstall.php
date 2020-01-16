<?php

namespace tricosmic\energylabel\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;

class Uninstall implements UninstallInterface
{
	protected $_logger;
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        CategorySetupFactory $categorySetupFactory,
        \Tricosmic\EnergyLabel\Logger\Logger $logger
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
         $this->categorySetupFactory = $categorySetupFactory;
         $this->_logger = $logger;
    }
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        $this->_logger->info('in setup uninstall');

        $attributeGroupName = 'Energy Labels';
        
        $eavSetup->removeAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'tc_en_label' // attribute code to remove
            );
        $this->_logger->info('removed attribute tc_en_label');
        $eavSetup->removeAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'tc_en_label_position' // attribute code to remove
            );
        $this->_logger->info('removed attribute tc_en_label_position');
         $categorySetup->removeAttributeGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeGroupName
        );
        $this->_logger->info('removed attribute Group');
        echo "in there";
        die("in there");
        $setup->endSetup();
    }
}

?>