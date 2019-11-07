<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CentraliseProductVariant Entity
 *
 * @property int $SN
 * @property string|null $ItemCode
 * @property string|null $ParentItemCode
 * @property string|null $ProductName
 * @property string|null $SizeCode
 * @property string|null $SizeDescription
 * @property string|null $ColorCode
 * @property string|null $ColorDescription
 * @property string|null $StyleCode
 * @property string|null $StyleDescription
 * @property string|null $InfoText
 * @property string|null $ItemId
 * @property string|null $Path
 * @property string|null $ProductStatus
 * @property string|null $Sku
 */
class CentraliseProductVariant extends Entity
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
        'ItemCode' => true,
        'ParentItemCode' => true,
        'ProductName' => true,
        'SizeCode' => true,
        'SizeDescription' => true,
        'ColorCode' => true,
        'ColorDescription' => true,
        'StyleCode' => true,
        'StyleDescription' => true,
        'InfoText' => true,
        'ItemId' => true,
        'Path' => true,
        'ProductStatus' => true,
        'Sku' => true
    ];
}
