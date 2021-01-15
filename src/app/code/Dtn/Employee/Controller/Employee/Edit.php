<?php

namespace Dtn\Employee\Controller\Employee;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Dtn\Employee\Model\EmployeeFactory
     */
    protected $employeeFactory;
    /**
     * @var
     */
    protected $_request;
    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * Edit constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\App\Request\Http $request
     * @param \Dtn\Employee\Model\EmployeeFactory $employeeFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        $this->coreRegistry = $coreRegistry;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->_request->getParam('id');
        $this->coreRegistry->register('editRecordId', $id);
        return $this->_pageFactory->create();
    }
}
