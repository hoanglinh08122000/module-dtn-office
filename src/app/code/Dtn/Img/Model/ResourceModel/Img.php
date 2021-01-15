<?php

namespace Dtn\Img\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;

class Img extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('img_girl', 'id');
    }
}

