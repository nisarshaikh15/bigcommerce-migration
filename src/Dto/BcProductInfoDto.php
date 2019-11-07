<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dto;

/**
 * Description of BcProductInfoDto
 *
 * @author user
 */
class BcProductInfoDto {
    public $name;
    public $price;
    public $inventory_level;
    public $inventory_tracking;
    public $description;
    public $categories;
    public $weight = 1;
    public $type = "physical";
    public $images;
    public $variants;
    
}
