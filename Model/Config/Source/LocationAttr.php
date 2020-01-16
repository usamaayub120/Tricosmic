<?php
namespace tricosmic\energylabel\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class LocationAttr extends AbstractSource
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
                ['value' => 'left', 'label' => __('Top Left')],
                ['value' => 'right', 'label' => __('Top Right')]
            ];
        }
        return $this->_options;
    }

    
    final public function toOptionArray()
    {
         return array(
            array('value' => 'left', 'label' => __('Top Left')),
            array('value' => 'right', 'label' => __('Top Right'))
         );
     }
}