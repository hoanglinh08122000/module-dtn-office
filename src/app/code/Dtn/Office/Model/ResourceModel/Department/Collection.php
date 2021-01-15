<?php
namespace Dtn\Office\Model\ResourceModel\Department;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Dtn\Office\Model\Department',
            'Dtn\Office\Model\ResourceModel\Department'
        );
    }
}
