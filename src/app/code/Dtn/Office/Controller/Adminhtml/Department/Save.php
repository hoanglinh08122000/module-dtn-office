<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
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
     * Save constructor.
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
        $this->departmentFactory = $departmentFactory;
        $this->_pageFactory = $pageFactory;
        $this->resultRedirect = $resultRedirect;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        // check empty entity id
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $newData = [
            'name' => $data['name'],
        ];
        $post = $this->departmentFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try {
            $post->addData($newData);
            $post->save();
            return $this->resultRedirect->create()->setPath('admindtn/department/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
