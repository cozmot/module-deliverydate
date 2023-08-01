<?php
/**
 * Cozmot
 *
 * NOTICE OF LICENSE
 * This source file is subject to the cozmot.com license that is
 * available through the world-wide-web at this URL:
 * https://cozmot.com/end-user-license-agreement
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Commerce
 * @package     Module
 * @copyright   Copyright (c) Cozmot (https://cozmot.com/)
 * @license     https://cozmot.com/end-user-license-agreement
 *
 */

namespace Cozmot\DeliveryDate\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\LocalizedException;
use Cozmot\DeliveryDate\Helper\DeliveryDateHelper;

class SalesQuoteItemSetProductObserver implements ObserverInterface
{
    public function __construct(
        protected RequestInterface   $request,
        protected DeliveryDateHelper $deliveryDateHelper
    )
    {
    }

    /**
     * Add delivery_date to quote_item table
     *
     * @param EventObserver $observer
     * @return void
     * @throws LocalizedException
     */
    public function execute(EventObserver $observer)
    {
        if ($this->deliveryDateHelper->showDeliveryDate()) {
            if ($this->request->getParam('delivery_date')) {
                $quoteItem = $observer->getEvent()->getQuoteItem();

                if (!$quoteItem->getDeliveryDate()) {
                    $deliveryDate = $this->request->getParam('delivery_date');
                    $deliveryDate = str_replace('/', '-', $deliveryDate);
                    $deliveryDate = date("Y-m-d", strtotime($deliveryDate));
                    $quoteItem->setDeliveryDate($deliveryDate);
                }
            }
        }
    }
}
