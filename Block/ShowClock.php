<?php

/**
 * Created by PhpStorm.
 * User: toan
 * Date: 19/03/2019
 * Time: 16:35
 */

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class ShowClock extends Template
{
    protected $scopeConfig;
    public function __construct(Template\Context $context, array $data = [],\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }
    public function getTitle(){
        return $this->scopeConfig->getValue('clock/general/title');
    }
    public function getTitleColor(){
        return $this->scopeConfig->getValue('clock/general/text_clock');
    }
    public function getClockColor(){
        return $this->scopeConfig->getValue('clock/general/color_clock');
    }
}