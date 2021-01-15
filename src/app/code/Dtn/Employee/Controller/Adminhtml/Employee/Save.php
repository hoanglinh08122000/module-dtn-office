<?php

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Dtn\Employee\Model\EmployeeFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * @var EmployeeFactory
     */
    private $_employeeFactory;
    /**
     * @var
     */
    private $_resultRedirect;
    /**
     * @var DataPersistorInterface
     */
    private $_dataPersistor;

    /**
     * Save constructor.
     * @param Context $context
     * @param EmployeeFactory $employeeFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory,
        DataPersistorInterface $dataPersistor
    ) {
        $this->_employeeFactory = $employeeFactory;
        $this->_dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        // get post data
        $data = $this->getRequest()->getParams();
        // check empty employee_id
        if(empty($data['employee_id'])){
            $employee = $this->_employeeFactory->create();
        } else {
            $id  = $data['employee_id'];
            $employee = $this->_employeeFactory->create()->load($id);
            if($employee->getId()){
                $employee = $this->_employeeFactory->create()->load($id);
            }
        }
        $employee->setDepartment($data['department']);
        $employee->setFirstname($data['firstname']);
        $employee->setLastname($data['lastname']);
        $employee->setEmail($data['email']);
        $employee->setDob($data['dob']);
        $employee->setWorkingyears($data['workingyears']);
        $employee->setSalary($data['salary']);
        $employee->setNote($data['note']);
       // $this->_eventManager->dispatch("demo_events", ['postData' => $employee]);
        $employee->save();
        $this->messageManager->addSuccessMessage(__('You have been saved employee successfully.'));
        if ($this->getRequest()->getParam('back')) {
            return $this->_redirect('*/*/edit', ['employee_id' => $employee->getId(), '_current' => true]);
        }

        return $this->_redirect('*/*/');
    }
}
