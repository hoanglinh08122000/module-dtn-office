<?php

namespace Dtn\Employee\Controller\Employee;

use Magento\Framework\View\Element\Messages;

class Create extends \Magento\Framework\App\Action\Action
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
     * Create constructor.
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

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        // get data post
        $data = $this->getRequest()->getParams();
//        print_r($data);
//        die();
        if (!empty($data)) {
            $employee = $this->employeeFactory->create();
            $saveemployee = $employee->setData($data)->save();
            if ($saveemployee) {
                $this->messageManager->addSuccessMessage(__($data['firstname'] . ' added success.'));
            } else {
                $this->messageManager->addErrorMessage(__($data['firstname'] . ' added failed.'));
            }
            return $this->_redirect('employee/employee');
        }
    }
}
