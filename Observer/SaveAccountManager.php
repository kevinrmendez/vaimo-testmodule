<?php


namespace Vaimo\TestModule\Observer;


class SaveAccountManager implements \Magento\Framework\Event\ObserverInterface
{
    private $orderFactory;

    public function __construct(\Magento\Sales\Model\ResourceModel\Order $orderFactory) {
        $this->orderFactory = $orderFactory;


}
    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $data = $observer->getData('order');
        $subtotal = $data->getSubtotal();
        if ($subtotal > 5){
            $test = ['account_manager' => 'Tom'];
           // $this->orderFactory->create()->addData($test )->save();

        }
        $address = $data->getBillingAddress()["postcode"];
        return $this;
    }

}