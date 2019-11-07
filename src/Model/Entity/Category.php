<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $cid
 * @property string|null $Category
 * @property int|null $parent_id
 * @property int|null $Level
 * @property string|null $Path
 * @property int $bc_cat_id Description
 */
class Category extends Entity
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
        'Category' => true,
        'ParentId' => true,
        'Level' => true,
        'Path' => true
    ];
}
