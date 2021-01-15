<?php

namespace Dtn\Employee\Controller\Employee;

use Magento\Framework\View\Element\Messages;

class Update extends \Magento\Framework\App\Action\Action
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
     * Update constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Dtn\Employee\Model\EmployeeFactory $employeeFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
//        print_r($data);
        $id = $this->getRequest()->getParam('employee_id');
        $employee = $this->employeeFactory->create()->load($id);
        if ($employee->getEmployeeId()) {

            $employee->setData($data)->save();
        }
        return $this->_redirect('employee/employee');
    }
}
