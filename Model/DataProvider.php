<?php


namespace Vaimo\TestModule\Model;

use Vaimo\TestModule\Model\ResourceModel\AccountManager\CollectionFactory;


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
        return [];
    }
}