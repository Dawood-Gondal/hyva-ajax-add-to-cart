<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_HyvaAjaxAddToCart
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\HyvaAjaxAddToCart\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

/**
 * Class AddToCart
 */
class AddToCart extends Template
{
    public const XML_PATH_ENABLE_AJAX_ADD_TO_CART = 'hyvaAddToCart/general/enable_ajax_add_to_cart';
    public const XML_PATH_AJAX_ADD_TO_CART_DELAY = 'hyvaAddToCart/general/ajax_add_to_cart_delay';

    /**
     * @return string
     * @throws \Magento\Framework\Exception\ValidatorException
     */
    protected function _toHtml(): string
    {
        if (!$this->getTemplate() || !$this->isAjaxAddToCartEnabled()) {
            return '';
        }
        return $this->fetchView($this->getTemplateFile());
    }

    /**
     * @return string
     */
    public function getDelay(): string
    {
        return (string)$this->_scopeConfig->getValue(
            self::XML_PATH_AJAX_ADD_TO_CART_DELAY,
            ScopeInterface::SCOPE_STORE
        );
    }


    /**
     * @param $scopeCode
     * @return bool
     */
    public function isAjaxAddToCartEnabled(): bool
    {
        return $this->_scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE_AJAX_ADD_TO_CART,
            ScopeInterface::SCOPE_STORE
        );
    }
}
