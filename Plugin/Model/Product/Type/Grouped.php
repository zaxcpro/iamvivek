<?php

namespace Vivek\GroupedProductAttribute\Plugin\Model\Product\Type;
use \Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection;
use \Magento\Framework\App\Config\ScopeConfigInterface;


class Grouped
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Here we add fields to retrieve collection of associated products
     *
     * @param \Magento\GroupedProduct\Model\Product\Type\Grouped $subject
     * @return \Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection
     */
    public function afterGetAssociatedProductCollection(\Magento\GroupedProduct\Model\Product\Type\Grouped $subject, Collection $result)
    {
        $status = $this->scopeConfig->getValue(
            'vivek_groupedproductattribute/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $attributesToShow = $this->scopeConfig->getValue(
            'vivek_groupedproductattribute/general/attibutelist',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if($status){
            if($attributesToShow){
                $result->addAttributeToSelect(explode(',',$attributesToShow));
            }
        }
        return $result;
    }
}

?>
