<?php

namespace OneClick\Order\Ui\DataProvider;


use Magento\Ui\DataProvider\AbstractDataProvider;
use OneClick\Order\Model\ResourceModel\Collection\CollectionFactory;
class ListingDataProvider extends AbstractDataProvider
{
    private  CollectionFactory $collectionFactory;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }

        $item = $this->getCollection()->toArray();
        return $item;
    }
}
