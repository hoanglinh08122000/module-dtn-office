<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;
    /**
     * @var \Dtn\Office\Model\DepartmentFactory
     */
    private $_departmentFactory;
    const ADMIN_RESOURCE = "Dtn_Office::department";

    /**
     * Edit constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Dtn\Office\Model\DepartmentFactory $departmentFactory
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->_departmentFactory = $departmentFactory;
        $this->_pageFactory = $pageFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $department = $this->_departmentFactory->create();
        // Get Record id from Url parameters
        $id = $this->getRequest()->getParam('entity_id');
        if ($id) {
            $department->load($id);
            if (!$department->getId()) {
                return $this->_redirect('dtn/department/index');
            }
        }
        $this->_registry->register('departmentFactory', $department);
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->setKeywords(__('Edit Page'));
        $resultPage->setActiveMenu('Dtn_Office::main_menu');
        $resultPage->getConfig()->getTitle()->prepend('Department Module');
        if ($department->getId()) {
            $pageTitle = __('Edit Department', $department->getId());
        } else {
            $pageTitle = __('New Department');
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;

    }
}
