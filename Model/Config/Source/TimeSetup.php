<?php
namespace tricosmic\energyLabel\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class TimeSetup extends AbstractSource
{

    protected $optionFactory;

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => 'AAAA', 'label' => __('Label A***')],
                ['value' => 'AAA', 'label' => __('Label A**')],
                ['value' => 'AA', 'label' => __('Label A*')],
                ['value' => 'A', 'label' => __('Label A')],
                ['value' => 'B', 'label' => __('Label B')],
                ['value' => 'C', 'label' => __('Label C')],
                ['value' => 'D', 'label' => __('Label D')],
                ['value' => 'E', 'label' => __('Label E')],
                ['value' => 'F', 'label' => __('Label F')],
                ['value' => 'G', 'label' => __('Label G')]
            ];
        }
        return $this->_options;
    }

    
    final public function toOptionArray()
    {
         return array(
            array('value' => 'AAAA', 'label' => __('Label A***')),
            array('value' => 'AAA', 'label' => __('Label A**')),
            array('value' => 'AA', 'label' => __('Label A*')),
            array('value' => 'A', 'label' => __('Label A')),
            array('value' => 'B', 'label' => __('Label B')),
            array('value' => 'C', 'label' => __('Label C')),
            array('value' => 'D', 'label' => __('Label D')),
            array('value' => 'E', 'label' => __('Label E')),
            array('value' => 'F', 'label' => __('Label F')),
            array('value' => 'G', 'label' => __('Label G'))
         );
     }
}