<?php

namespace Dtn\Img\Model;

class Img extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this-> _init(\Dtn\Img\Model\ResourceModel\Img::class);
    }
}
