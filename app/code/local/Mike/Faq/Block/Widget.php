<?php
class Mike_Faq_Block_Widget extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface {

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('mike_faq/widget/view.phtml');
    }
    public function getFaqCollection()
    {
      $faq_options = $this->getData('view_options');
      $ids = $this->getData('ids_list');
      $id_list = explode(',',$ids);

      if (empty($faq_options)) {
        return false;
      }
      $arr_options = explode(',', $faq_options);

      if (is_array($arr_options) && count($arr_options)) {
        foreach ($arr_options as $option) {
          //var_dump($option);
          switch ($option) {
            case 'random':
              $collection = Mage::getModel('mike_faq/faq')->getCollection();
              $collection->getSelect()->order('RAND()');
              $collection->getSelect()->limit(4);
              return $collection;
            break;
            case 'ids_list':
              if(!empty($id_list)){
              //  var_dump($id_list);
                $collection = Mage::getModel('mike_faq/faq')->getCollection();
                $collection->addFieldToFilter('entity_id',array('in' => $id_list));
                $collection->getSelect()->order('entity_id','DESC');
                return $collection;
              } else {
                return false;
              }
            break;
            default:
              return false;
              break;
            }
          }
        }
        return false;
    }
  /*public function _toHtml() {
    $html = '';
    $faq_options = $this->getData('view_options');

    if (empty($faq_options)) {
      return $html;
    }

    $arr_options = explode(',', $faq_options);

    if (is_array($arr_options) && count($arr_options)) {
      foreach ($faq_options as $option) {
        Switch ($arr_options) {
          case 'random':
            $html .= '<div><a href="javascript: window.print();">Print</a></div>';
          break;
          case 'ids_list':
            $html .= '<div><a href="mailto:yourcompanyemail@domain.com&subject=Inquiry">Contact Us</a></div>';
          break;
        }
      }
    }

    return $html;
  }*/
}
