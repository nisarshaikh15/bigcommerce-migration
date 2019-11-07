<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dto;

/**
 * Description of CreateCsvProductDto
 *
 * @author user
 */
class CreateCsvProductDto {
    public $productId;
    public $name;
    public $description;
    public $price;
    public $images;
    public $additionalImages;
    public $categoryId;
}
