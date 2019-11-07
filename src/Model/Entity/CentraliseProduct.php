<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CentraliseProduct Entity
 *
 * @property int $CenterId
 * @property string|null $Id
 * @property string|null $Name
 * @property string|null $Image
 * @property string|null $Code
 * @property float|null $Price
 * @property float|null $SalePrice
 * @property string|null $Orderable
 * @property string|null $Options
 * @property string|null $Headline
 * @property string|null $Caption
 * @property string|null $Leaf
 * @property string|null $GiftCertificate
 * @property string|null $NeedShip
 * @property string|null $Ypath
 * @property string|null $ProductUrl
 * @property string|null $SubsectionHtml
 * @property string|null $CrossSell
 * @property string|null $ScEnlargeTitles
 * @property string|null $Insert1
 * @property string|null $Insert2
 * @property string|null $Tab1Title
 * @property string|null $Tab1Text
 * @property string|null $Tab2Title
 * @property string|null $Tab2Text
 * @property string|null $Tab3Title
 * @property string|null $Tab3Text
 * @property int|null $Added
 * @property string|null $ItemId
 */
class CentraliseProduct extends Entity
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
        'Name' => true,
        'Image' => true,
        'Code' => true,
        'Price' => true,
        'SalePrice' => true,
        'Orderable' => true,
        'Options' => true,
        'Headline' => true,
        'Caption' => true,
        'Leaf' => true,
        'GiftCertificate' => true,
        'NeedShip' => true,
        'Ypath' => true,
        'ProductUrl' => true,
        'SubsectionHtml' => true,
        'CrossSell' => true,
        'ScEnlargeTitles' => true,
        'Insert1' => true,
        'Insert2' => true,
        'Tab1Title' => true,
        'Tab1Text' => true,
        'Tab2Title' => true,
        'Tab2Text' => true,
        'Tab3Title' => true,
        'Tab3Text' => true,
        'Added' => true,
        'ItemId' => true
    ];
}
