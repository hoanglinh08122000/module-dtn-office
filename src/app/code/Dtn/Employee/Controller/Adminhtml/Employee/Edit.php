<?php

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Dtn\Employee\Model\EmployeeFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $_pageFactory;
    /**
     * @var Registry
     */
    private Registry $_registry;
    /**
     * @var EmployeeFactory
     */
    private EmployeeFactory $_employeeFactory;

    const ADMIN_RESOURCE = "Dtn_Employee::employee";

    /**
     * Edit constructor.
     * @param Context $context
     * @param EmployeeFactory $employeeFactory
     * @param PageFactory $pageFactory
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory,
        PageFactory $pageFactory,
        Registry $registry
    )
    {
        $this->_employeeFactory = $employeeFactory;
        $this->_pageFactory = $pageFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $employee = $this->_employeeFactory->create();
        $id = $this->getRequest()->getParam('employee_id');
        if ($id) {
            $employee->load($id);
            if (!$employee->getId()) {
                return $this->_redirect('dtn/employee/employee/index');
            }
        }
        $this->_registry->register('employee', $employee);
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Edit Page'));
        $resultPage->setActiveMenu('Dtn_Employee::main_menu');
        $resultPage->getConfig()->getTitle()->prepend('employee Module');
        if ($employee->getId()) {
            $pageTitle = __('Edit', $employee->getId());
        } else {
            $pageTitle = __('New employee');
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;

    }
}
