<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductOptionNew Entity
 *
 * @property int $Id
 * @property string|null $ProductCode
 * @property string|null $OptionName
 * @property string|null $Options
 * @property string|null $ItemId
 * @property string|null $Name
 * @property int $status
 */
class ProductOptionNew extends Entity
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
        'Id' => true,
        'ProductCode' => true,
        'OptionName' => true,
        'Options' => true,
        'ItemId' => true,
        'Name' => true,
        'status' => true
    ];
}
