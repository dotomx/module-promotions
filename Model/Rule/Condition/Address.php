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

namespace Dotomx\Promotions\Model\Rule\Condition;

/**
 * Description of Address
 */
class Address extends \Magento\SalesRule\Model\Rule\Condition\Address 
{

    /**
     * Load attribute options
     *
     * @return $this
     */
    public function loadAttributeOptions()
    {
        $attributes = [
            'base_subtotal' => __('Subtotal'),
            'total_qty' => __('Total Items Quantity'),
            'weight' => __('Total Weight'),
            'shipping_method' => __('Shipping Method'),
            'payment_method' => __('Payment Method'),
            'postcode' => __('Shipping Postcode'),
            'region' => __('Shipping Region'),
            'region_id' => __('Shipping State/Province'),
            'country_id' => __('Shipping Country'),
        ];

        $this->setAttributeOption($attributes);

        return $this;
    }
}
