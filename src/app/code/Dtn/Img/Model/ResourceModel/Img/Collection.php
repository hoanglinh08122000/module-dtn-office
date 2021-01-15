<?php

namespace Dtn\Img\Model\ResourceModel\Img;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Dtn\Img\Model\Img',
            'Dtn\Img\Model\ResourceModel\Img'
        );
    }
}
