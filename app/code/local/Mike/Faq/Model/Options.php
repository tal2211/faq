<?php
class Mike_Faq_Model_Options {
/**
  * Provide available options as a value/label array
  *
  * @return array
  */
  public function toOptionArray() {
    return array(
      array('value' => 'random', 'label' => 'Random list'),
      array('value' => 'ids_list', 'label' => 'List by ids'),
    );
  }
}
