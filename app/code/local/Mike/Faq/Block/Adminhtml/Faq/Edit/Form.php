<?php

class Mike_Faq_Block_Adminhtml_Faq_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('mike_faq');
        $model = Mage::registry('current_faq');

        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array(
                        'id' => $this->getRequest()->getParam('id')
                    )),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('faq_form', array('legend' => $helper->__('Faq Information')));

        $fieldset->addField('quetion', 'text', array(
            'label' => $helper->__('Quetion'),
            'required' => true,
            'name' => 'quetion',
        ));

        $fieldset->addField('answer', 'editor', array(
            'label' => $helper->__('Answer'),
            'required' => true,
            'name' => 'answer',
        ));
        $yesno = array(
                      array(
                          'value' => 0,
                          'label' => Mage::helper('catalog')->__('No')
                      ),
                      array(
                          'value' => 1,
                          'label' => Mage::helper('catalog')->__('Yes')
                      ));
        $fieldset->addField('status', 'select', array(
            'label' => $helper->__('status'),
            'required' => true,
            'name' => 'status',
            'values' => $yesno,
        ));
        $fieldset->addField('itemsortorder', 'text', array(
            'label' => $helper->__('Order'),
            'required' => true,
            'name' => 'itemsortorder',
        ));
        if (!Mage::app()->isSingleStoreMode()) {
            $field = $fieldset->addField('store_id', 'multiselect', array(
                'name'      => 'stores[]',
                'label'     => Mage::helper('checkout')->__('Store View'),
                'title'     => Mage::helper('checkout')->__('Store View'),
                'required'  => true,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
            $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
            $field->setRenderer($renderer);
        }
        else {
            $fieldset->addField('store_id', 'hidden', array(
                'name'      => 'stores[]',
                'value'     => Mage::app()->getStore(true)->getId()
            ));
            $model->setStoreId(Mage::app()->getStore(true)->getId());
        }

        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}
