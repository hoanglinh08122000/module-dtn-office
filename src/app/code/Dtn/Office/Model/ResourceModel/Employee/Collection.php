<?php
namespace Dtn\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Dtn\Office\Model\Employee',
            'Dtn\Office\Model\ResourceModel\Employee'
        );
    }
}
