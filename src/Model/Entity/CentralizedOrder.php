<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CentralizedOrder Entity
 *
 * @property int $Id
 * @property int|null $OrderNumber
 * @property string|null $OrderId
 * @property string|null $CustomerNumber
 * @property string|null $OrderStatus
 * @property string|null $CreditCardType
 * @property float|null $TotalAmount
 * @property float|null $OrderBalance
 * @property \Cake\I18n\FrozenTime|null $KeyedDate
 * @property \Cake\I18n\FrozenTime|null $OrderDate
 * @property string|null $Keycode
 * @property string|null $FirstName
 * @property string|null $LastName
 * @property string|null $Addr1
 * @property string|null $Addr2
 * @property string|null $Zip
 * @property string|null $City
 * @property string|null $State
 * @property string|null $TLD
 * @property string|null $PhoneNumber
 * @property string|null $Email
 * @property string|null $PaymentType
 * @property string|null $CreditCardAVSResult
 * @property string|null $CreditCardCCVResult
 * @property float|null $TotalPaid
 * @property float|null $TotalReturned
 * @property float|null $TotalRefunded
 * @property float|null $Balance
 */
class CentralizedOrder extends Entity
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
        'OrderNumber' => true,
        'OrderId' => true,
        'CustomerNumber' => true,
        'OrderStatus' => true,
        'CreditCardType' => true,
        'TotalAmount' => true,
        'OrderBalance' => true,
        'KeyedDate' => true,
        'OrderDate' => true,
        'Keycode' => true,
        'FirstName' => true,
        'LastName' => true,
        'Addr1' => true,
        'Addr2' => true,
        'Zip' => true,
        'City' => true,
        'State' => true,
        'TLD' => true,
        'PhoneNumber' => true,
        'Email' => true,
        'PaymentType' => true,
        'CreditCardAVSResult' => true,
        'CreditCardCCVResult' => true,
        'TotalPaid' => true,
        'TotalReturned' => true,
        'TotalRefunded' => true,
        'Balance' => true
    ];
}
