<?php

class Mike_Faq_Block_Adminhtml_Faq extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
      parent::_construct();

      $helper = Mage::helper('mike_faq');
      $this->_blockGroup = 'mike_faq';
      $this->_controller = 'adminhtml_faq';

      $this->_headerText = $helper->__('Faq Management');
      $this->_addButtonLabel = $helper->__('Add faq');
    }

}
