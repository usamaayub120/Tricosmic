<?php

namespace tricosmic\energyLabel\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        CategorySetupFactory $categorySetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.6') < 0) {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
          "tc_en_label_position",
          [
          'group' => "",
          'label' => "Energy Label Position",
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
          "source" => "Tricosmic\EnergyLabel\Model\Config\Source\LocationAttr",
          'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
          ]
      );
        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
         // get default attribute set id
        $attributeSetId = $categorySetup->getDefaultAttributeSetId(\Magento\Catalog\Model\Product::ENTITY);
        $attributeGroupName = 'Energy Labels';
 
        // your custom attribute group/tab
        $categorySetup->addAttributeGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group name
            10 // sort order
        );
 
        // add attribute to group
        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'tc_en_label_position', // attribute code
            20 // sort order
        );
 
        // add attribute to group
        $categorySetup->addAttributeToGroup(
            \Magento\Catalog\Model\Product::ENTITY,
            $attributeSetId,
            $attributeGroupName, // attribute group
            'tc_en_label', // attribute code
            10 // sort order
        );

        $setup->endSetup();
      }
    }
}