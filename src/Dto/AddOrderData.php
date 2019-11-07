<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dto;

/**
 * Description of AddOrderData
 *
 * @author user
 */
class AddOrderData {
    public $status_id;
    public $customer_id;
    public $billing_address;
    public $shipping_addresses;
    public $products;
    public $date_created;
    public $discount_amount = 0;
}
