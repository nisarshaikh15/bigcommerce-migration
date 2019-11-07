<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dto;

/**
 * Description of Create ProductDto
 *
 * @author user
 */
class CreateProductDto {
    public $name = "BigCommerce Coffee Mug";
    public $price = "10.00";
    public $category = [23,18];
    public $weight = 4;
    public $type = "physical";
    
//    public $company = "BigCommerce";
//    public $first_name = "sgsdgsdg";
//    public $last_name = "Dogsgsdge";
//    public $phone = "1234567890";
//    public $email = "tsdfdsfest@gmail.com";
}
