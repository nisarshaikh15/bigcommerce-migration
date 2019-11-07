<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductCatalogImage Entity
 *
 * @property int $SN
 * @property string|null $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $link
 * @property string|null $image_link
 * @property string|null $mobile_link
 * @property string|null $additional_image_link
 * @property string|null $availability
 * @property string|null $availability_date
 * @property float|null $price
 * @property string|null $sale_price
 * @property string|null $sale_price_effective_date
 * @property string|null $unit_pricing_measure
 * @property string|null $unit_pricing_base_measure
 * @property string|null $google_product_category
 * @property string|null $product_type
 * @property string|null $brand
 * @property string|null $gtin
 * @property string|null $mpn
 * @property string|null $identifier_exists
 * @property string|null $condition
 * @property string|null $adult
 * @property string|null $multipack
 * @property string|null $is_bundle
 * @property string|null $age_group
 * @property string|null $color
 * @property string|null $gender
 * @property string|null $material
 * @property string|null $pattern
 * @property string|null $size
 * @property string|null $size_type
 * @property string|null $size_system
 * @property string|null $item_group_id
 * @property string|null $adwords_redirect
 * @property string|null $custom_label_0
 * @property string|null $custom_label_1
 * @property string|null $custom_label_2
 * @property string|null $custom_label_3
 * @property string|null $custom_label_4
 * @property string|null $promotion_id
 * @property string|null $shipping
 * @property string|null $shipping_label
 * @property string|null $shipping_weight
 * @property string|null $shipping_length
 * @property string|null $shipping_width
 * @property string|null $shipping_height
 * @property string|null $min_handling_time
 * @property string|null $max_handling_time
 * @property string|null $tax
 * @property string|null $tax_category
 * @property string|null $c:options:string
 * @property string|null $c:manufacturer:string
 *
 * @property \App\Model\Entity\ItemGroup $item_group
 * @property \App\Model\Entity\Promotion $promotion
 */
class ProductCatalogImage extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'title' => true,
        'description' => true,
        'link' => true,
        'image_link' => true,
        'mobile_link' => true,
        'additional_image_link' => true,
        'availability' => true,
        'availability_date' => true,
        'price' => true,
        'sale_price' => true,
        'sale_price_effective_date' => true,
        'unit_pricing_measure' => true,
        'unit_pricing_base_measure' => true,
        'google_product_category' => true,
        'product_type' => true,
        'brand' => true,
        'gtin' => true,
        'mpn' => true,
        'identifier_exists' => true,
        'condition' => true,
        'adult' => true,
        'multipack' => true,
        'is_bundle' => true,
        'age_group' => true,
        'color' => true,
        'gender' => true,
        'material' => true,
        'pattern' => true,
        'size' => true,
        'size_type' => true,
        'size_system' => true,
        'item_group_id' => true,
        'adwords_redirect' => true,
        'custom_label_0' => true,
        'custom_label_1' => true,
        'custom_label_2' => true,
        'custom_label_3' => true,
        'custom_label_4' => true,
        'promotion_id' => true,
        'shipping' => true,
        'shipping_label' => true,
        'shipping_weight' => true,
        'shipping_length' => true,
        'shipping_width' => true,
        'shipping_height' => true,
        'min_handling_time' => true,
        'max_handling_time' => true,
        'tax' => true,
        'tax_category' => true,
        'c:options:string' => true,
        'c:manufacturer:string' => true,
        'item_group' => true,
        'promotion' => true
    ];
}
