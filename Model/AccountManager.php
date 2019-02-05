<?php
namespace Vaimo\TestModule\Model;


class AccountManager extends \Magento\Framework\Model\AbstractModel{

    protected function _construct(){
        $this->_init("Vaimo\TestModule\Model\ResourceModel\AccountManager");
    }
}