<?php

class Mike_Faq_Block_Random extends Mage_Core_Block_Template
{

    public function getFaqCollection()
    {
        $collection = Mage::getModel('mike_faq/faq')->getCollection();
        $collection->getSelect()->order('RAND()');
        $collection->getSelect()->limit(4);
        return $collection;
    }
}
