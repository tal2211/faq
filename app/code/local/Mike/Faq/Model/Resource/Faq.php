<?php
class Mike_Faq_Model_Resource_Faq extends Mage_Core_Model_Mysql4_Abstract {
    public function _construct()
    {
        $this->_init('mike_faq/table_faq', 'entity_id');
    }
}
