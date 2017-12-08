<?php

class Mike_Faq_Block_Faq extends Mage_Core_Block_Template
{

    public function getFaqCollection()
    {
        $faqCollection = Mage::getModel('mike_faq/faq')->getCollection();
        $faqCollection->setOrder('itemsortorder', 'DESC');
        return $faqCollection;
    }
}
