<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $bcId Description
 * @property int $CID
 * @property int $CustomerNumber
 * @property string|null $MatchCodeFirst
 * @property string|null $MatchCodeZIP1
 * @property string|null $MatchCodeZIP2
 * @property string|null $MatchCodeZIP3
 * @property string|null $MatchCodeLast
 * @property int $PIN
 * @property \Cake\I18n\FrozenTime|null $DateCreated
 * @property int $PINChanged
 * @property \Cake\I18n\FrozenTime|null $DateChanged
 * @property string|null $OriginCode
 * @property string|null $OriginType
 * @property int $TitleCode
 * @property string|null $Firstname
 * @property string|null $MidInitial
 * @property string|null $Lastname
 * @property string|null $Maternalname
 * @property string|null $Company
 * @property string|null $Addr1
 * @property string|null $Addr2
 * @property string|null $ZIP
 * @property string|null $City
 * @property string|null $State
 * @property string|null $TLD
 * @property string|null $Country
 * @property string|null $StateForeign
 * @property string|null $AreaCode
 * @property string|null $PhoneNumber
 * @property string|null $Email
 * @property \Cake\I18n\FrozenTime|null $DOB
 * @property \Cake\I18n\FrozenTime|null $TOB
 * @property \Cake\I18n\FrozenTime|null $POB
 * @property int $Memos
 * @property bool $DoNotMailFlag
 * @property bool $NixieFlag
 * @property bool $BadDebtFlag
 * @property bool $DoNotRentFlag
 * @property bool $DeceasedFlag
 * @property bool $BusinessFlag
 * @property bool $NoAVSFlag
 * @property int $LID
 * @property string|null $IP
 * @property string|null $OS
 * @property string|null $IPChange
 * @property string|null $OSChange
 * @property int $TotalOrders
 * @property float $TotalAmountOrdered
 * @property float $TotalAmountPaid
 * @property int $TotalItems
 * @property int $TotalReturns
 * @property int $TotalReturnItems
 * @property float $TotalAmountRefunded
 * @property string|null $LastAdcode
 * @property float $LastOrderPaid
 * @property int $LastOrderItems
 * @property \Cake\I18n\FrozenTime|null $LastOrderDate
 * @property \Cake\I18n\FrozenTime|null $LastReturnDate
 * @property string|null $LastReturnReason
 * @property \Cake\I18n\FrozenTime|null $FirstOrderDate
 * @property \Cake\I18n\FrozenTime|null $Interest1_LastOrder
 * @property int $Interest1_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest2_LastOrder
 * @property int $Interest2_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest3_LastOrder
 * @property int $Interest3_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest4_LastOrder
 * @property int $Interest4_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest5_LastOrder
 * @property int $Interest5_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest6_LastOrder
 * @property int $Interest6_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest7_LastOrder
 * @property int $Interest7_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest8_LastOrder
 * @property int $Interest8_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest9_LastOrder
 * @property int $Interest9_Orders
 * @property \Cake\I18n\FrozenTime|null $Interest10_LastOrder
 * @property int $Interest10_Orders
 * @property int|null $DupeCustomerNumber
 * @property \Cake\I18n\FrozenTime|null $DupeDate
 * @property int|null $PrimaryShippingAddress
 * @property string|null $OverwriteKeycode
 * @property float $StoreCreditAmount
 * @property int|null $CustomerLevel
 * @property string|null $PreferredSalesAgentUser
 * @property string|null $HouseNumber
 * @property string|null $SubCity
 * @property string|null $Building
 * @property string|null $Apartment
 * @property string|null $County
 * @property int|null $SmartAddressResultCode
 * @property bool $DoNotEmail
 * @property bool $DoNotCall
 * @property \Cake\I18n\FrozenTime|null $RecordLastUpdated
 * @property int|null $CurrentAddressID
 * @property int $OverwriteKeycodeType
 * @property \Cake\I18n\FrozenTime|null $LastContactDate
 * @property bool $BankruptFlag
 * @property int|null $PrimaryCreditCard
 */
class Customer extends Entity
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
        'MatchCodeFirst' => true,
        'MatchCodeZIP1' => true,
        'MatchCodeZIP2' => true,
        'MatchCodeZIP3' => true,
        'MatchCodeLast' => true,
        'PIN' => true,
        'DateCreated' => true,
        'PINChanged' => true,
        'DateChanged' => true,
        'OriginCode' => true,
        'OriginType' => true,
        'TitleCode' => true,
        'Firstname' => true,
        'MidInitial' => true,
        'Lastname' => true,
        'Maternalname' => true,
        'Company' => true,
        'Addr1' => true,
        'Addr2' => true,
        'ZIP' => true,
        'City' => true,
        'State' => true,
        'TLD' => true,
        'Country' => true,
        'StateForeign' => true,
        'AreaCode' => true,
        'PhoneNumber' => true,
        'Email' => true,
        'DOB' => true,
        'TOB' => true,
        'POB' => true,
        'Memos' => true,
        'DoNotMailFlag' => true,
        'NixieFlag' => true,
        'BadDebtFlag' => true,
        'DoNotRentFlag' => true,
        'DeceasedFlag' => true,
        'BusinessFlag' => true,
        'NoAVSFlag' => true,
        'LID' => true,
        'IP' => true,
        'OS' => true,
        'IPChange' => true,
        'OSChange' => true,
        'TotalOrders' => true,
        'TotalAmountOrdered' => true,
        'TotalAmountPaid' => true,
        'TotalItems' => true,
        'TotalReturns' => true,
        'TotalReturnItems' => true,
        'TotalAmountRefunded' => true,
        'LastAdcode' => true,
        'LastOrderPaid' => true,
        'LastOrderItems' => true,
        'LastOrderDate' => true,
        'LastReturnDate' => true,
        'LastReturnReason' => true,
        'FirstOrderDate' => true,
        'Interest1_LastOrder' => true,
        'Interest1_Orders' => true,
        'Interest2_LastOrder' => true,
        'Interest2_Orders' => true,
        'Interest3_LastOrder' => true,
        'Interest3_Orders' => true,
        'Interest4_LastOrder' => true,
        'Interest4_Orders' => true,
        'Interest5_LastOrder' => true,
        'Interest5_Orders' => true,
        'Interest6_LastOrder' => true,
        'Interest6_Orders' => true,
        'Interest7_LastOrder' => true,
        'Interest7_Orders' => true,
        'Interest8_LastOrder' => true,
        'Interest8_Orders' => true,
        'Interest9_LastOrder' => true,
        'Interest9_Orders' => true,
        'Interest10_LastOrder' => true,
        'Interest10_Orders' => true,
        'DupeCustomerNumber' => true,
        'DupeDate' => true,
        'PrimaryShippingAddress' => true,
        'OverwriteKeycode' => true,
        'StoreCreditAmount' => true,
        'CustomerLevel' => true,
        'PreferredSalesAgentUser' => true,
        'HouseNumber' => true,
        'SubCity' => true,
        'Building' => true,
        'Apartment' => true,
        'County' => true,
        'SmartAddressResultCode' => true,
        'DoNotEmail' => true,
        'DoNotCall' => true,
        'RecordLastUpdated' => true,
        'CurrentAddressID' => true,
        'OverwriteKeycodeType' => true,
        'LastContactDate' => true,
        'BankruptFlag' => true,
        'PrimaryCreditCard' => true
    ];
}
