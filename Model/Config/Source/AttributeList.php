<?php

namespace Vivek\GroupedProductAttribute\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class AttributeList implements ArrayInterface
{

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Eav\Attribute $attributeFactory
    )
    {
        $this->_attributeFactory = $attributeFactory;
    }

    public function toOptionArray()
    {

        $arr = $this->toArray();
        $ret = [];

        foreach ($arr as $key => $value) {

            $ret[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $ret;
    }

    public function toArray()
    {
        $attributesList = array();
        $attributeInfo = $this->_attributeFactory->getCollection();
        $exclude = [
            'name',
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'tax_class_id',
            'image'];
        foreach($attributeInfo as $attributes){
            if(!in_array($attributes->getData('attribute_code'),$exclude)){
                $attributesList[$attributes->getData('attribute_code')] = __($attributes->getData('frontend_label'));
            }
        }

        return $attributesList;
    }

}
