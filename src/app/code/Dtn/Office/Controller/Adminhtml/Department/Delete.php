<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
    /**
     * @var \Dtn\Office\Model\DepartmentFactory
     */
    protected $departmentFactory;
    /**
     * @var \Magento\Backend\Model\View\Result\RedirectFactory
     */
    private $resultRedirect;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     * @param \Dtn\Office\Model\DepartmentFactory $departmentFactory
     * @param \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirect
     */
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        \Dtn\Office\Model\DepartmentFactory $departmentFactory,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirect
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->departmentFactory = $departmentFactory;
        $this->resultRedirect = $resultRedirect;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // Get Record id from Url parameters
        $id = $this->getRequest()->getParam('entity_id');
        if ($id) {
            $department = $this->departmentFactory->create()->load($id);
            if ($department->getId()) {
                try {
                    $department->delete();
                    $this->messageManager->addSuccessMessage(__('The department has been delete successfully'));
                } catch (\Exception $ex) {
                    $this->messageManager->addErrorMessage(__('Something went wrong while delete'));
                }
                // after delete Record ,return to Listing page
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->messageManager->addErrorMessage(__('The Record does not exits'));
        //  Return to Listing page
        return $resultRedirect->setPath('*/*/');
    }
}
