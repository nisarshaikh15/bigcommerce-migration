<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductOptionFinal Entity
 *
 * @property int $Id
 * @property string|null $ProductCode
 * @property string $OgProductCode
 * @property string|null $OptionName Description
 * @property string|null $OptionNameRevised
 * @property string|null $OptionsRevised
 * @property string|null $ShortCode
 * @property string|null $Notes
 * @property string|null $OptionId Description
 */
class ProductOptionFinal extends Entity
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
        'ProductCode' => true,
        'OgProductCode' => true,
        'OptionNameRevised' => true,
        'OptionsRevised' => true,
        'ShortCode' => true,
        'Notes' => true
    ];
}
