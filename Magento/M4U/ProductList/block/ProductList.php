<?php

class M4U_ProductList_Block_ProductList extends Mage_Core_Block_Template
{

    protected function _getProductCollection($order)
    {
        $collection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToFilter('custom_position', array('neq' => ''))
            ->addAttributeToSort('custom_position', $order)
            ->addAttributeToSelect('*')
            ->load();
        $content=[];
        foreach ($collection as $_product){
            $productName =  $_product->getName();
            $productUrl =  $_product->getProductUrl();
            $productImg = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).'media/catalog/product'. $_product->getImage();
            $productPrice = round($_product->getPrice(),2);
            $productPosition = $_product->_getData('custom_position');
            array_push( $content,'
            <div class="product-container">
                <a href="'.$productUrl.'">
                  <div class="product-img">
                    <img src="'.$productImg.'" />
                  </div>
                </a>
                <div class="product-info">
                  <a href="'.$productUrl.'"><p class="product-name">'.$productName.'</p></a>
                  <p class="product-price"><span>Price: </span>'.$productPrice.' EUR</p>
                  <p class="product-position">Position: '.$productPosition.'</p>
                </div>
            </div>');
        }

        return $content;
    }


}