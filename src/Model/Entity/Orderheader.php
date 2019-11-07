<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderheader Entity
 *
 * @property int $CID
 * @property int $OrderNumber
 * @property int $CustomerNumber
 * @property \Cake\I18n\FrozenTime|null $BatchMonth
 * @property int $BatchNumber
 * @property string|null $OriginType
 * @property string|null $KeyCode
 * @property int $FollowUpID
 * @property string|null $SiteID
 * @property string|null $ClickID
 * @property string|null $StoreCode
 * @property string|null $OrderID
 * @property \Cake\I18n\FrozenTime|null $KeyedDate
 * @property int $PaymentType
 * @property string|null $CheckNumber
 * @property string|null $CreditCardNumber
 * @property int $CreditCardType
 * @property \Cake\I18n\FrozenDate|null $CreditCardExpDate
 * @property int $CreditCardStatus
 * @property \Cake\I18n\FrozenTime|null $CreditCardChargeDate
 * @property int $CreditCardChargeAttempt
 * @property string|null $CreditCardFile
 * @property int $CreditCardInstallments
 * @property int $CreditCardInstallmentsProcessed
 * @property string|null $CreditCardAuthCode
 * @property int $CreditCardAuthStatus
 * @property \Cake\I18n\FrozenTime|null $CreditCardAuthRequestDate
 * @property string|null $CreditCardAuthRequestID
 * @property \Cake\I18n\FrozenTime|null $CreditCardAuthDate
 * @property int $CreditCardAuthAttempt
 * @property string|null $CreditCardAuthFile
 * @property string|null $CreditCardAVSResult
 * @property string|null $CreditCardCCVResult
 * @property string|null $BankRoutingNumber
 * @property string|null $BankAccountNumber
 * @property \Cake\I18n\FrozenTime|null $LastPayDate
 * @property \Cake\I18n\FrozenTime|null $ReportDate
 * @property float $SHTaxPercent
 * @property int $SHCode
 * @property string|null $IP
 * @property string|null $OS
 * @property string|null $IPChange
 * @property string|null $OSChange
 * @property string|null $PIN
 * @property float $Time
 * @property bool $GiftWrapping
 * @property string|null $Username
 * @property int $PaymentPlanID
 * @property string|null $OverwriteKeycode
 * @property \Cake\I18n\FrozenTime|null $OrderDate
 * @property string|null $Reference
 * @property int|null $AiringID
 * @property \Cake\I18n\FrozenDate|null $CreditCardStartDate
 * @property string|null $CreditCardIssueNumber
 * @property \Cake\I18n\FrozenTime|null $QuoteExpiryDate
 * @property int $OrderType
 * @property int|null $CreditCardSearch
 * @property string|null $DNIS
 * @property \Cake\I18n\FrozenTime|null $RecordLastUpdated
 * @property int $OrderFacilityID
 * @property int|null $OrderStatus
 * @property int|null $CurrentPaymentCollectionsID
 * @property int|null $CurrentPaymentCollectionsCycle
 * @property string|null $CreditCardHash
 * @property string|null $OriginalEntryKeycode
 * @property string|null $Vendor
 * @property string|null $CallToAction
 * @property string|null $CustomerIP
 * @property string|null $AiringStation
 * @property \Cake\I18n\FrozenTime|null $AiringDate
 * @property \Cake\I18n\FrozenTime|null $PaymentPlanBasisDate
 * @property bool $IsPaymentPlanOrder
 * @property bool $PaymentIsTokenized
 * @property int|null $LeadNumber
 * @property bool|null $StorageExpired
 * @property float $TotalAmount
 * @property float $TotalPaid
 * @property float $TotalReturned
 * @property float $TotalRefunded
 * @property float $Tax
 * @property float $SH
 * @property float $SHTax
 * @property float|null $HeaderSHAmount
 * @property float|null $OrderBalance
 * @property string|null $CreditCardBIN
 * @property string|null $TaxLocationZIP
 * @property string|null $TaxLocationCity
 * @property string|null $TaxLocationCounty
 * @property string|null $TaxLocationState
 * @property string|null $TaxLocationTLD
 * @property int|null $SHTaxRuleMatchType
 * @property \Cake\I18n\FrozenTime|null $SHTaxCalculationDate
 * @property string|null $CreditCardLast4Digits
 * @property int|null $AutoRefundExpiry
 * @property int $SaveInProgress
 * @property int|null $CreditCardId
 * @property int|null $PayPalAccountId
 * @property int|null $ApplePayTokenId
 * @property int|null $CreditCardOriginId
 * @property int|null $OverridePaymentProcessingDivision
 * @property string|null $CreditCardCCV
 * @property \Cake\I18n\FrozenDate|null $CreditCardCCVRemovalDate
 * @property int|null $BcOrderStatus Description
 * @property string|null $BcOrderType Description
 */
class Orderheader extends Entity
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
        'BatchMonth' => true,
        'BatchNumber' => true,
        'OriginType' => true,
        'KeyCode' => true,
        'FollowUpID' => true,
        'SiteID' => true,
        'ClickID' => true,
        'StoreCode' => true,
        'OrderID' => true,
        'KeyedDate' => true,
        'PaymentType' => true,
        'CheckNumber' => true,
        'CreditCardNumber' => true,
        'CreditCardType' => true,
        'CreditCardExpDate' => true,
        'CreditCardStatus' => true,
        'CreditCardChargeDate' => true,
        'CreditCardChargeAttempt' => true,
        'CreditCardFile' => true,
        'CreditCardInstallments' => true,
        'CreditCardInstallmentsProcessed' => true,
        'CreditCardAuthCode' => true,
        'CreditCardAuthStatus' => true,
        'CreditCardAuthRequestDate' => true,
        'CreditCardAuthRequestID' => true,
        'CreditCardAuthDate' => true,
        'CreditCardAuthAttempt' => true,
        'CreditCardAuthFile' => true,
        'CreditCardAVSResult' => true,
        'CreditCardCCVResult' => true,
        'BankRoutingNumber' => true,
        'BankAccountNumber' => true,
        'LastPayDate' => true,
        'ReportDate' => true,
        'SHTaxPercent' => true,
        'SHCode' => true,
        'IP' => true,
        'OS' => true,
        'IPChange' => true,
        'OSChange' => true,
        'PIN' => true,
        'Time' => true,
        'GiftWrapping' => true,
        'Username' => true,
        'PaymentPlanID' => true,
        'OverwriteKeycode' => true,
        'OrderDate' => true,
        'Reference' => true,
        'AiringID' => true,
        'CreditCardStartDate' => true,
        'CreditCardIssueNumber' => true,
        'QuoteExpiryDate' => true,
        'OrderType' => true,
        'CreditCardSearch' => true,
        'DNIS' => true,
        'RecordLastUpdated' => true,
        'OrderFacilityID' => true,
        'OrderStatus' => true,
        'CurrentPaymentCollectionsID' => true,
        'CurrentPaymentCollectionsCycle' => true,
        'CreditCardHash' => true,
        'OriginalEntryKeycode' => true,
        'Vendor' => true,
        'CallToAction' => true,
        'CustomerIP' => true,
        'AiringStation' => true,
        'AiringDate' => true,
        'PaymentPlanBasisDate' => true,
        'IsPaymentPlanOrder' => true,
        'PaymentIsTokenized' => true,
        'LeadNumber' => true,
        'StorageExpired' => true,
        'TotalAmount' => true,
        'TotalPaid' => true,
        'TotalReturned' => true,
        'TotalRefunded' => true,
        'Tax' => true,
        'SH' => true,
        'SHTax' => true,
        'HeaderSHAmount' => true,
        'OrderBalance' => true,
        'CreditCardBIN' => true,
        'TaxLocationZIP' => true,
        'TaxLocationCity' => true,
        'TaxLocationCounty' => true,
        'TaxLocationState' => true,
        'TaxLocationTLD' => true,
        'SHTaxRuleMatchType' => true,
        'SHTaxCalculationDate' => true,
        'CreditCardLast4Digits' => true,
        'AutoRefundExpiry' => true,
        'SaveInProgress' => true,
        'CreditCardId' => true,
        'PayPalAccountId' => true,
        'ApplePayTokenId' => true,
        'CreditCardOriginId' => true,
        'OverridePaymentProcessingDivision' => true,
        'CreditCardCCV' => true,
        'CreditCardCCVRemovalDate' => true
    ];
}
