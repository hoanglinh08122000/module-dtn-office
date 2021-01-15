<?php

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Index constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Dtn_Employee::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Employee'));
        return $resultPage;
    }
}
