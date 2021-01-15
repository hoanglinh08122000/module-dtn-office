<?php

namespace Dtn\Employee\Observer;

use Magento\Framework\Event\Observer;

class DemoEvent implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(Observer $observer)
    {
        $data = $observer->getData('postData');
        $data->setData('lastname','event thay du lieu');
        $observer->setData('firstname',$data);
    }
}
