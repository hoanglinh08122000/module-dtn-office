<?php

namespace Dtn\Office\Controller\Adminhtml\Employee;

class Edit extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    private $_registry;
    private $_employeeFactory;
    const ADMIN_RESOURCE = "Dtn_Office::employee";

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->_employeeFactory = $employeeFactory;
        $this->_pageFactory = $pageFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }

    public function execute() {
        $employee= $this->_employeeFactory->create();
        $id = $this->getRequest()->getParam('employee_id');
        if($id){
            $employee->load($id);

            if(!$employee->getId()){

                return $this->_redirect('dtn/employee/index');
            }
        }
        $this->_registry->register('employee',$employee);
        $resultPage =$this->_pageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Edit Page'));

        $resultPage->setActiveMenu('Dtn_Office::main_menu');
        $resultPage->getConfig()->getTitle()->prepend('employee Module');
        if($employee->getId()) {
            $pageTitle = __('Edit',$employee->getId());
        } else {
            $pageTitle = __('New employee');
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;

    }
}
