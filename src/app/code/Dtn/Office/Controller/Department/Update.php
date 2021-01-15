<?php

namespace Dtn\Office\Controller\Department;

use Magento\Framework\View\Element\Messages;

class Update extends \Magento\Framework\App\Action\Action
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
     * Create constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Dtn\Office\Model\DepartmentFactory $departmentFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->departmentFactory = $departmentFactory;
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
        $id = $this->getRequest()->getParam('entity_id');
        $department = $this->departmentFactory->create()->load($id);
        if ($department->getEntityId()) {

            $department->setData($data)->save();
        }
        return $this->_redirect('dtnoffice/department/display');
    }
}
