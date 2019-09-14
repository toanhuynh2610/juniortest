<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Movie\Block\Adminhtml\Form\Field;

use Magento\Customer\Model\Customer\Source\Group;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

class CustomerGroup extends Select
{
    protected $customerGroup;
    public function __construct(Context $context, Group $group, array $data = [])
    {
        parent::__construct($context, $data);
        $this->customerGroup = $group;
    }
    protected function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->customerGroup->toOptionArray());
        }
        return parent::_toHtml();
    }
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}