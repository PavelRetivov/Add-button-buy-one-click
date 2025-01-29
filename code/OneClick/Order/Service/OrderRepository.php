<?php

namespace OneClick\Order\Service;


use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use OneClick\Order\Api\Data\OrderSearchResultInterfaceFactory;
use OneClick\Order\Api\Data\OrderSearchResultInterface;
use OneClick\Order\Api\OrderRepositoryInterface;
use OneClick\Order\Model\ResourceModel\OrderOneClick;
use OneClick\Order\Model\OrderOneClickFactory;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var OrderOneClick
     */
    private $resource;

    /**
     * @var OrderOneClickFactory
     */
    private $orderFactory;

    private $collectionProcessor;

    private $searchResultFactory;


    public function __construct(
        OrderOneClick $resource,
        OrderOneClickFactory $orderOneClickFactory,
        CollectionProcessorInterface $collectionProcessor,
        OrderSearchResultInterfaceFactory $searchResultFactory,
    )
    {
        $this->resource = $resource;
        $this->orderFactory = $orderOneClickFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultFactory = $searchResultFactory;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): OrderSearchResultInterface
    {
        $searchResult =  $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);

        $this->collectionProcessor->process($searchCriteria, $searchResult);

        return $searchResult;
    }

    public function get(int $orderId)
    {
      $object = $this->orderFactory->create();
      $this->resource->load($object, $orderId);
      return $object;
    }
}
