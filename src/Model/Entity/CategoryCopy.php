<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CategoryCopy Entity
 *
 * @property int $cid
 * @property string|null $name
 * @property int|null $parent_id
 * @property int|null $length
 * @property string|null $category_name_REVISED
 * @property int|null $length-REVISED
 * @property string|null $status
 * @property int|null $consolidate
 * @property int|null $bc_cat_id
 *
 * @property \App\Model\Entity\CategoryCopy $parent_category_copy
 * @property \App\Model\Entity\BcCat $bc_cat
 * @property \App\Model\Entity\CategoryCopy[] $child_category_copy
 */
class CategoryCopy extends Entity
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
        'name' => true,
        'parent_id' => true,
        'length' => true,
        'category_name_REVISED' => true,
        'length-REVISED' => true,
        'status' => true,
        'consolidate' => true,
        'bc_cat_id' => true,
        'parent_category_copy' => true,
        'bc_cat' => true,
        'child_category_copy' => true
    ];
}
