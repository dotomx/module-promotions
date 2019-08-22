<?php
/**
 * A Magento 2 module named Dotomx/Promotions
 * Copyright (C) 2019 Japhet Perez Atristain <japhet@doto.com.mx>
 * 
 * This file is part of Dotomx/Promotions.
 * 
 * Dotomx/Promotions is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Dotomx\Promotions\Controller\Checkout;

/**
 * Description of ApplyPaymentMethod
 *
 * @author japhet
 */
class ApplyPaymentMethod extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Checkout\Model\Cart $cart
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        $this->layoutFactory = $layoutFactory;
        $this->cart = $cart;

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $pMethod = $this->getRequest()->getParam('payment_method');

        $quote = $this->cart->getQuote();

        $quote->getPayment()->setMethod($pMethod['method']);

        $quote->setTotalsCollectedFlag(false);
        $quote->collectTotals();
        $quote->save();
    }
}