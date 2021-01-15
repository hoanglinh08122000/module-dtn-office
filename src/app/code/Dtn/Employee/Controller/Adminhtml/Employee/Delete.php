<?php

namespace Dtn\Employee\Controller\Adminhtml\Employee;

use Dtn\Empployee\Model\EmployeeFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
    /**
     * @var RedirectFactory
     */
    private $resultRedirect;
    /**
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Delete constructor.
     * @param Action\Context $context
     * @param PageFactory $pageFactory
     * @param \Dtn\Employee\Model\EmployeeFactory $employeeFactory
     * @param RedirectFactory $resultRedirect
     */
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        \Dtn\Employee\Model\EmployeeFactory $employeeFactory,
        RedirectFactory $resultRedirect
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
        $this->resultRedirect = $resultRedirect;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // Get Record id from Url parameters
        $id = $this->getRequest()->getParam('employee_id');
        if ($id) {
            $department = $this->employeeFactory->create()->load($id);
            if ($department->getId()) {
                try {
                    $department->delete();
                    $this->messageManager->addSuccessMessage(__('The employee has been delete successfully'));
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
