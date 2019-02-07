<?php


namespace Vaimo\TestModule\Plugin;


class OrderPlugin
{
    public function beforeSave(\Magento\Sales\Model\Order $subject)
    {
        $subject->getData() ;

    }
}
