<?php

namespace Dtn\Office\Block;

class  Employee extends \Magento\Framework\View\Element\Template
{
    /**
     *
     */
    const DEPARTMENTTABLE = "department";
    const EMPLOYEETABLE = "dtn_office_employee_entity";

    /**
     * @var \Dtn\Office\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $_employeeFactory;
    /**
     * @var \Dtn\Office\Model\EmployeeFactory
     */
    protected $employeeFactory;
    /**
     * @var \Dtn\Office\Model\DepartmentFactory
     */
    protected $departmentFactory;
    /**
     * @var \Dtn\Office\Model\Department
     */
    private $department;
    /**
     * @var \Dtn\Office\Model\Employee
     */
    private $employee;
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Office\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory,
        \Dtn\Office\Model\Department $department,
        \Dtn\Office\Model\Employee $employee
    )
    {
        $this->_employeeFactory = $employeeFactoryFactory;
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        $this->department = $department;
        $this->employee = $employee;
        $this->request = $request;
        parent::__construct($context);
    }

    public function getDepartment()
    {
        return $this->departmentFactory->create()->getCollection();
    }

    public function getEmployee()
    {
        $employee = $this->_employeeFactory->create();
        if ($this->getRequest()->getParam('fillter') === 'department') {
            $employee->addFieldToFilter('department_id', ['gt' => 8]);
        } else {
            if ($this->getRequest()->getParam('fillter') === 'wrokingyears') {
                $employee->addFieldToFilter('working_years', ['gt' => 2]);
            } else {
                if ($this->getRequest()->getParam('fillter') === 'salary') {
                    $employee->addFieldToFilter('salary', ['gt' => 10000000]);
                } else {
                    return $employee;
                }
            }
        }
        return $employee;
    }

    /**
     * redirect controller create
     *
     * @return string
     */
    public function addNew()
    {
        return '/dtnoffice/employee/create';
    }

    /**
     * reditect controller delete
     *
     * @return string
     */
    public function delete()
    {
        return '/dtnoffice/employee/delete';
    }

    /**
     * redirect controller Update
     *
     * @return string
     */
    public function Update()
    {
        return '/dtnoffice/employee/update';
    }

    /**
     * get one record to update
     *
     * @return \Dtn\Office\Model\Employee
     */
    public function getEditRecord()
    {
        $id = $this->request->getParam('id');
        $department = $this->employee->load($id);
        return $department;
    }
}
