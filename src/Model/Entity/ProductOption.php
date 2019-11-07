<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductOption Entity
 *
 * @property int $OptionId
 * @property string|null $ProductCode
 * @property string|null $OptionName
 * @property string|null $Options
 * @property string|null $ItemId
 * @property string|null $Name
 */
class ProductOption extends Entity
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
        'OptionName' => true,
        'Options' => true,
        'ItemId' => true,
        'Name' => true
    ];
}
