<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * YahooProductCatalog Entity
 *
 * @property int $auto_increment_id
 * @property string|null $path
 * @property string|null $id
 * @property string|null $ItemCode
 * @property string|null $caption
 * @property string|null $ship_weight
 * @property string|null $sc_enlarge_titles
 * @property string|null $abstract
 * @property string|null $cross_sell
 * @property string|null $product_url
 * @property string|null $tab_2_text
 * @property string|null $sale_price
 * @property string|null $tab_1_text
 * @property string|null $tab_1_title
 * @property string|null $orderable
 * @property string|null $label
 * @property string|null $need_ship
 * @property string|null $ypath
 * @property string|null $options
 * @property string|null $tab_3_title
 * @property string|null $subsection_html
 * @property string|null $taxable
 * @property string|null $headline
 * @property string|null $video
 * @property string|null $condition
 * @property string|null $family
 * @property string|null $sale_price_override
 * @property string|null $alternate_subsection
 * @property string|null $tab_2_title
 * @property string|null $gift_certificate
 * @property string|null $price
 * @property string|null $tab_3_text
 * @property string|null $regular_price_override
 * @property string|null $name
 * @property int|null $Added
 * @property int|null $cid Description
 * @property int|null $bc_product_id Description
 * @property string $bc_option_id Description
 */
class YahooProductCatalog extends Entity
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
        'path' => true,
        'id' => true,
        'ItemCode' => true,
        'caption' => true,
        'ship_weight' => true,
        'sc_enlarge_titles' => true,
        'abstract' => true,
        'cross_sell' => true,
        'product_url' => true,
        'tab_2_text' => true,
        'sale_price' => true,
        'tab_1_text' => true,
        'tab_1_title' => true,
        'orderable' => true,
        'label' => true,
        'need_ship' => true,
        'ypath' => true,
        'options' => true,
        'tab_3_title' => true,
        'subsection_html' => true,
        'taxable' => true,
        'headline' => true,
        'video' => true,
        'condition' => true,
        'family' => true,
        'sale_price_override' => true,
        'alternate_subsection' => true,
        'tab_2_title' => true,
        'gift_certificate' => true,
        'price' => true,
        'tab_3_text' => true,
        'regular_price_override' => true,
        'name' => true,
        'Added' => true
    ];
}
