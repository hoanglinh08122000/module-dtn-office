<?php

namespace Dtn\Employee\Block\Adminhtml\Employee\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90];
    }

    /**
     * @return redirect Dtn/Employee/Employee/Save
     */
    public function getSaveUrl()
    {
        return $this->getUrl('adminemployee/employee/save', []);
    }
}
