<?php

namespace tricosmic\energylabel\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
          "enlabel",
          [
          'group' => "",
          'label' => "Energy Label",
          'is_html_allowed_on_front' => true,
          'default' => '0',
          'note' => '',
          'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
          'visible' => true,
          'required' => false,
          'user_defined' => false,
          'searchable' => true,
          'filterable' => true,
          'comparable' => true,
          'visible_on_front' => true,
          'visible_in_advanced_search' => true,
          'unique' => false,
          "frontend_class" => "",
          "used_in_product_listing" => true,
          "input" => "multiselect",
          "type" => "varchar",
          "source" => "tricosmic\energylabel\Model\Config\Source\TimeSetup",
          'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
          ]
      );
        $eavSetup->addAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
          "enlabel_location",
          [
          'group' => "",
          'label' => "Energy Label Location",
          'is_html_allowed_on_front' => true,
          'default' => '0',
          'note' => '',
          'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
          'visible' => true,
          'required' => false,
          'user_defined' => false,
          'searchable' => true,
          'filterable' => true,
          'comparable' => true,
          'visible_on_front' => true,
          'visible_in_advanced_search' => true,
          'unique' => false,
          "frontend_class" => "",
          "used_in_product_listing" => true,
          "input" => "multiselect",
          "type" => "varchar",
          "source" => "tricosmic\energyLabel\Model\Config\Source\LocationAttr",
          'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
          ]
      );
        $setup->endSetup();
    }
}