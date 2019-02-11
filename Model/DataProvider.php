<?php


namespace Vaimo\TestModule\Model;

use Vaimo\TestModule\Model\ResourceModel\AccountManager\CollectionFactory;
//use Vaimo\TestModule\Model\AccountManager;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $accountManagerCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $accountManagerCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
//        if (isset($this->loadedData)) {
////            return $this->loadedData;
////        }
////
////        $items = $this->collection->getItems();
////        $this->loadedData = array();
////
////        foreach ($items as $manager) {
////            // our fieldset is called "contact" or this table so that magento can find its datas:
////            $this->loadedData[$manager->getId()]['account_manager'] = $manager->getData();
////        }
////
////        return $this->loadedData;
        return [];

    }
}