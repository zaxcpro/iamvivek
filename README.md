# Show Selected Attributes in Grouped Product Collection Module

## With this Module you can easily get the desired attribute of magento in Grouped Product Children Collection.

Just Install the Module and in the **System->Configuration->Vivek->Grouped Product Attribute**, Enable the Module and Select the Attributes which you need to get in the Collection.

Once done with the process using this function getAssociatedProducts()

**$children = $product->getTypeInstance()->getAssociatedProducts($product);**

foreach($children as $child){ echo '<pre/>'; print_R($child->getData()); }

In the getData function you will get the data in Collection.





