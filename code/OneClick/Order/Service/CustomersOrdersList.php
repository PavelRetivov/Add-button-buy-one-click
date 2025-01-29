<?php

declare(strict_types=1);

namespace OneClick\Order\Service;

use Magento\Framework\Api\SearchCriteriaBuilder;
use OneClick\Order\Api\CustomerOrdersListInterface;
use OneClick\Order\Api\OrderRepositoryInterface;
use OneClick\Order\Api\Data\OrderInterface;

class CustomersOrdersList implements CustomerOrdersListInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    private  $orderRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
    )
    {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderRepository = $orderRepository;
    }


    /**
     * @return OrderInterface[]
     */
    public function getList()
    {
        return $this->orderRepository
            ->getList($this->searchCriteriaBuilder->create())
            ->getItems();
    }
    public function getOrder(int $entity_id)
    {
        $searchCriteria = $this->searchCriteriaBuilder->
            addFilter('entity_id', $entity_id, 'eq')->
            create();

        return $this->orderRepository
            ->getList($searchCriteria)
            ->getItems()[$entity_id];
    }

    public function getItem(int $entity_id)
    {
        return $this->orderRepository->get($entity_id);
    }
}
