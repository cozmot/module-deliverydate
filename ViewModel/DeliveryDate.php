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

namespace Cozmot\DeliveryDate\ViewModel;

use Cozmot\DeliveryDate\Helper\DeliveryDateHelper;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class DeliveryDate extends DataObject implements ArgumentInterface
{

    public function __construct(
        protected DeliveryDateHelper $deliveryDateHelper
    )
    {
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function showDeliveryDate(): bool
    {
        return $this->deliveryDateHelper->showDeliveryDate();
    }

    /**
     * @return int
     */
    public function getDeliveryDateDelay(): int
    {
        return $this->deliveryDateHelper->getDeliveryDateDelay();
    }

    /**
     * @return string
     */
    public function getDeliveryDateLabel(): string
    {
        return $this->deliveryDateHelper->getDeliveryDateLabel();
    }
}
