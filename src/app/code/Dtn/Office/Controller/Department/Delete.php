<?php

namespace Dtn\Office\Controller\Department;

class Delete extends \Magento\Framework\App\Action\Action
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
     * @var \Magento\Framework\App\Request\Http
     */
    protected $_request;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        $this->_request = $request;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $id = $this->_request->getParam('id');
        $department = $this->departmentFactory->create()->load($id)->delete();
        if ($department) {
            $this->messageManager->addSuccessMessage(__('Delete successfully.'));
        } else {
            $this->messageManager->addSuccessMessage(__('Delete failed.'));
        }
        return $this->_redirect('dtnoffice/department/display');
    }
}
