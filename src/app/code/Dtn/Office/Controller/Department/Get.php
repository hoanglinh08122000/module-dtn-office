<?php

namespace Dtn\Office\Controller\Department;

class Get extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Dtn\Office\Model\DepartmentFactory
     */
    protected $departmentFactory;
    /**
     * @var \Dtn\Office\Model\EmployeeFactory
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


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        $this->coreRegistry = $coreRegistry;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $id = $this->_request->getParam('id');
        $this->coreRegistry->register('editRecordId', $id);
        return $this->_pageFactory->create();
    }
}
