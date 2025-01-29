<?php

declare(strict_types=1);

namespace OneClick\Order\Controller\Adminhtml\Quickly\Order;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends Action
{
    const ADMIN_RESOURCE = 'OneClick_Order::quick_orders';

    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu("OneClick_Order::quick_orders");
        $resultPage->getConfig()->getTitle()->prepend(__('Quick Orders'));

        return $resultPage;
    }
}
