<?php

class Mike_Faq_Block_Adminhtml_Faq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'mike_faq';
        $this->_controller = 'adminhtml_faq';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('mike_faq');
        $model = Mage::registry('current_faq');

        if ($model->getId()) {
            return $helper->__("Edit Faq item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Faq item");
        }
    }

}
