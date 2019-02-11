<?php


namespace Vaimo\TestModule\Observer;


class SaveAccountManager implements \Magento\Framework\Event\ObserverInterface
{
    private $orderFactory;
    private $order;
    private  $accountManager;
    private  $accountManagerFactory;

    public function __construct(\Magento\Sales\Model\OrderFactory $orderFactory,
                                \Magento\Sales\Model\Order $order,
                                \Vaimo\TestModule\Model\AccountManager $accountManager,
                                \Vaimo\TestModule\Model\AccountManagerFactory $accountManagerFactory) {
        $this->orderFactory = $orderFactory;
        $this->order = $order;
        $this->accountManager = $accountManager;
        $this->accountManagerFactory = $accountManagerFactory;

}
    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $order = $observer->getData('order');
        $subtotal = $order->getSubtotal();
        //$id = $order->getId();
        $postal_code = $order->getBillingAddress()["postcode"];

        if ($subtotal > 10){
            $account_manager =$this->getAccountManager($postal_code);
            $order->setData("account_manager", $account_manager);
            $order->save();




        }

        return $this;
    }
    private function getAccountManager($postal_code)
    {
        //$this->accountManager;
        $collection = $this->accountManagerFactory->create()->getCollection();
        $manager = "";

        foreach ($collection as $value) {
            $value;

            $postal_code_string = $value->getDataByKey("postal_section");
            $postal_code_array = explode(",", $postal_code_string);
            if(in_array($postal_code, $postal_code_array )) {
                $manager = $value->getDataByKey("account_manager");
            } else {
                continue;
            }
        }
        return $manager;
    }
}