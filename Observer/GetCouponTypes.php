<?php

namespace Digitail\Sales\Observer;

use Magento\Framework\Event\ObserverInterface;

class GetCouponTypes implements ObserverInterface
{
    const SPECIFIC_COUPON = 'Specific Coupon';
    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $transport = $observer->getEvent()->getData('transport');
        $couponTypes = $transport['coupon_types'];
        $specificCoupon = [];
        $other = [];

        foreach ($couponTypes as $index => $value) {
            if ($value->getText() == self::SPECIFIC_COUPON) {
                $specificCoupon[$index] = $value;
                continue;
            }
            $other[$index] = $value;
        }

        $newOrder = $specificCoupon + $other;
        $transport->setData('coupon_types', $newOrder);
    }
}