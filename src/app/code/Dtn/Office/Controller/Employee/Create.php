<?php

namespace Dtn\Office\Controller\Employee;

use Magento\Framework\View\Element\Messages;

class Create extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Dtn\Office\Model\EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Create constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Dtn\Office\Model\EmployeeFactory $employeeFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory

    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Exception
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
//        print_r($data);
//        die();
        if (!empty($data)) {
            $department = $this->employeeFactory->create();
            $savedepartment = $department->setData($data)->save();
            if ($savedepartment) {
                $this->messageManager->addSuccessMessage(__($data['firstname'] . ' added success.'));
            } else {
                $this->messageManager->addErrorMessage(__($data['firstname'] . ' added failed.'));
            }
            return $this->_redirect('dtnoffice/employee');
        }
    }
}
