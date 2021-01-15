<?php

namespace Dtn\Employee\Controller\Employee;

class Delete extends \Magento\Framework\App\Action\Action
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
     * @var \Magento\Framework\App\Request\Http
     */
    protected $_request;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
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
        $employee = $this->employeeFactory->create()->load($id)->delete();
        if ($employee) {
            $this->messageManager->addSuccessMessage(__('Delete successfully.'));
        } else {
            $this->messageManager->addSuccessMessage(__('Delete failed.'));
        }
        return $this->_redirect('employee/employee');
    }
}
