<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml Review Edit Form
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Kush_Reviewimage_Block_Adminhtml_Review_Edit_Form extends Mage_Adminhtml_Block_Review_Edit_Form 
{

    protected function _prepareForm()
    {
        $review = Mage::registry('review_data');
        $product = Mage::getModel('catalog/product')->load($review->getEntityPkValue());
        $customer = Mage::getModel('customer/customer')->load($review->getCustomerId());

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'), 'ret' => Mage::registry('ret'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('review_details', array('legend' => Mage::helper('review')->__('Review Details'), 'class' => 'fieldset-wide'));

    
       echo $image= "<image height =60 width=60  src='".Mage::getBaseUrl("media").'reviewimages/'.$review->getReviewimage()."'>";
        
         $fieldset->addField('reviewimage', 'note', array(
            'label'     => Mage::helper('review')->__('Posted Review Image'),
            'text'      => $image,
        ));
         
      
        $form->setUseContainer(true);
        $form->setValues($review->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
