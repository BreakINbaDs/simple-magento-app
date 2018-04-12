<?php
class M4U_ProductList_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
        {
            $this->loadLayout(array('default'));
            $this->renderLayout();
        }
}