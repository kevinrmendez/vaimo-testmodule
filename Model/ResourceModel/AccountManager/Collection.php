<?php

namespace Vaimo\TestModule\Model\ResourceModel\AccountManager;


class Collection extends  \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        $this->_init('Vaimo\TestModule\Model\AccountManager', 'Vaimo\TestModule\Model\ResourceModel\AccountManager');
    }

}