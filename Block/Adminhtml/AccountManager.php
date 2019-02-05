<?php


namespace Vaimo\TestModule\Block\Adminhtml;


class AccountManager extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_get';
        $this->_blockGroup = 'Vaimo_TestModule';
        $this->_headerText = __('Account Manager List');
        parent::_construct();
    }

}