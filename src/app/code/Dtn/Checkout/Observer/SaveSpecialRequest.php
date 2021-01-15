<?php

namespace Dtn\Checkout\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class SaveSpecialRequest implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        if (empty($order) || empty($quote)) {
            return $this;
        }
        $shippingAddress = $quote->getShippingAddress();
//        var_dump($shippingAddress);
//        die();
        if ($shippingAddress->getRequest()) {
            $orderRequest = $order->getShippingAddress();
            $orderRequest->setRequest(
                $shippingAddress->getRequest()
            )->save();
        }

//        $order->setData('request', $quote->getRequest());
        return $this;
    }
}

