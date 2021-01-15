<?php

namespace Dtn\Office\Block;

class Display extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Dtn\Office\Model\ResourceModel\Department\CollectionFactory
     */
    protected $_departmentFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;
    /**
     * @var \Dtn\Office\Model\Department
     */
    private $department;

    /**
     * Display constructor.
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Request\Http $request
     * @param \Dtn\Office\Model\ResourceModel\Department\CollectionFactory $departmentFactory
     */
    public function __construct(
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Dtn\Office\Model\ResourceModel\Department\CollectionFactory $departmentFactory,
        \Dtn\Office\Model\Department $department
    )
    {
        $this->_departmentFactory = $departmentFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
        $this->request = $request;
        $this->department = $department;
    }

    /**
     * get data table department
     * fillter id>5 , name like a%
     *
     * @return \Dtn\Office\Model\ResourceModel\Department\Collection
     */
    public function getPostCollection()
    {

        $department = $this->_departmentFactory->create();
        if ($this->getRequest()->getParam('department') === 'equal') {
            $department->addFieldToFilter('entity_id', ['gt' => 5]);
        } else {
            if ($this->getRequest()->getParam('department') === 'like') {
                $department->addFieldToFilter('name', ['like' => 'a%']);
            } else {
                return $department;
            }
        }
        return $department;
    }

    /**
     * redirect controller create
     *
     * @return string
     */
    public function addNew()
    {
        return '/dtnoffice/department/create';
    }

    /**
     * redierct controller update
     * @return string
     */
    public function updateNew()
    {
        return '/dtnoffice/department/update';
    }

    /**
     * get record to update
     *
     * @return array
     */
    public function getEditRecord()
    {
        $id = $this->request->getParam('id');
        $department = $this->department->load($id);
        return $department;
    }

}
