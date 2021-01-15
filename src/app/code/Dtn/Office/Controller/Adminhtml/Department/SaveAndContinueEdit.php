<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class SaveAndContinueEdit extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Dtn_Office::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Department'));
        return $resultPage;
    }
}
