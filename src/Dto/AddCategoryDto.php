<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dto;

/**
 * Description of AddCategoryDto
 *
 * @author user
 */
class AddCategoryDto {
    public $parent_id;
    public $name;
    public $layout_file = "category.html";
    public $is_visible = true;
}
