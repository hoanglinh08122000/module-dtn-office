<?php

namespace Dtn\Employee\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this-> _init(\Dtn\Employee\Model\ResourceModel\Employee::class);
    }
}
