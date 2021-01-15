<?php

namespace Dtn\Employee\Block;

class  Employee extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $_employeeFactory;

    /**
     * @var \Dtn\Employee\Model\EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;
    /**
     * @var \Dtn\Employee\Model\Employee
     */
    private $employee;

    /**
     * Employee constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Request\Http $request
     * @param \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory
     * @param \Dtn\Employee\Model\EmployeeFactory $employeeFactory
     * @param \Dtn\Employee\Model\Employee $employee
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory,
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory,
        \Dtn\Employee\Model\Employee $employee

    )
    {
        $this->_employeeFactory = $employeeFactoryFactory;
        $this->employeeFactory = $employeeFactory;
        $this->employee = $employee;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * GET
     * @return array
     */
    public function getEmployee()
    {
        $employee = $this->_employeeFactory->create();
        return $employee;
    }

    /**
     * @return redirect Dtn/employee/employee/create
     */
    public function urlCreate()
    {
        return '/employee/employee/create';
    }

    /**
     * @return redirect Dtn/employee/employee/update
     */
    public function UrlUpdate()
    {
        return '/employee/employee/update';
    }

    /**
     *  Get one record to update
     *
     * @return \Dtn\Employee\Model\Employee
     */
    public function getEditRecord()
    {
        $id = $this->request->getParam('id');
        $employee = $this->employee->load($id);
        return $employee;
    }
}

