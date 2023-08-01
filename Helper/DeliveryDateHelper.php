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

namespace Cozmot\DeliveryDate\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class DeliveryDateHelper extends AbstractHelper
{

    public function __construct(
        protected Context $context
    )
    {
        parent::__construct($this->context);
    }

    /**
     * @return bool
     */
    public function showDeliveryDate(): bool
    {
        return (bool)$this->scopeConfig->getValue('delivery_date/general/enable_delivery_date',
            ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getDeliveryDateDelay(): int
    {
        return (int)$this->scopeConfig->getValue('delivery_date/general/max_delivery_date',
            ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getDeliveryDateLabel(): string
    {
        return $this->scopeConfig->getValue('delivery_date/general/delivery_date_label',
            ScopeInterface::SCOPE_STORE);
    }
}
