<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Dtn_office::save';
    /**
     * @var \Dtn\Office\Model\Department
     */
    protected $departmentFactory;
    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        \Dtn\Office\Model\Department $departmentFactory
    )
    {
        parent::__construct($context);
        $this->departmentFactory = $departmentFactory;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        // Init result Json
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        // Get POST data
        $postItems = $this->getRequest()->getParam('items', []);

        // Check request
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        // Save data to database
        foreach (array_keys($postItems) as $item) {
            try {
                $derpartment = $this->departmentFactory->create();
                $derpartment->load($item);
                $derpartment->setData($postItems[(string)$item]);
                $derpartment->save();
            } catch (\Exception $error) {
                $messages[] = __('save thất bại');
                $error = true;
            }
        }

        // Return result Json
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
