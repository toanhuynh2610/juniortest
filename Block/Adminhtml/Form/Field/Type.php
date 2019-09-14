<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Movie\Block\Adminhtml\Form\Field;

use Magenest\Movie\Model\Config\Source\ClockType;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

class Type extends Select
{
    protected $clockType;
    public function __construct(Context $context, ClockType $clockType, array $data = [])
    {
        parent::__construct($context, $data);
        $this->clockType = $clockType;
    }
    protected function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->clockType->toOptionArray());
        }
        return parent::_toHtml();
    }
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}