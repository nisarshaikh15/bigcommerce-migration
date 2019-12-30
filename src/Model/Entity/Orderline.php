<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderline Entity
 *
 * @property int $CID
 * @property int $OrderNumber
 * @property int $CustomerNumber
 * @property int $LineNumber
 * @property int $LineStatus
 * @property int $PreHoldLineStatus
 * @property \Cake\I18n\FrozenTime|null $LineStatusDate
 * @property string|null $ItemCode
 * @property string|null $DupItemCode
 * @property string|null $PriceType
 * @property float $TaxPercent
 * @property float $TotalPrice
 * @property float $TotalDiscount
 * @property \Cake\I18n\FrozenTime|null $ReportDate
 * @property int $Quantity
 * @property int $Bonus
 * @property string|null $Size
 * @property string|null $Color
 * @property string|null $Info
 * @property \Cake\I18n\FrozenTime|null $ProcessDate
 * @property int $FileSubCode
 * @property int $FileNumber
 * @property string|null $Filename
 * @property int $ShipmentID
 * @property \Cake\I18n\FrozenTime|null $ShipDate
 * @property int $ReturnQuantity
 * @property string|null $ReturnReason
 * @property \Cake\I18n\FrozenTime|null $ReturnDate
 * @property \Cake\I18n\FrozenTime|null $RefundDate
 * @property float $RefundAmount
 * @property string|null $RefundType
 * @property string|null $RefundCheckNumber
 * @property string|null $RefundCreditCardFile
 * @property string|null $RefundCreditCardStatus
 * @property \Cake\I18n\FrozenTime|null $RefundCreditCardDate
 * @property string|null $TrackingNumber
 * @property int $PaymentID
 * @property float $DiscountAmount
 * @property int $ParentLineNumber
 * @property bool $PriceOverwriteFlag
 * @property \Cake\I18n\FrozenTime|null $WaitDate
 * @property int|null $DefaultSubAgentID
 * @property \Cake\I18n\FrozenTime|null $SettlementFlagDate
 * @property \Cake\I18n\FrozenTime|null $CreateDate
 * @property int|null $OrderLineAdditionType
 * @property \Cake\I18n\FrozenTime|null $RecordLastUpdated
 * @property int|null $OriginalLineNumber
 * @property \Cake\I18n\FrozenTime|null $InvoiceDate
 * @property \Cake\I18n\FrozenTime|null $ShipmentConfirmationDate
 * @property int|null $TaxCodeID
 * @property int|null $TaxCodeExemptionID
 * @property int|null $FulfillmentType
 * @property \Cake\I18n\FrozenTime|null $DeliveryDate
 * @property bool|null $PrimaryProductFlag
 * @property int|null $PaymentPlanID
 * @property string|null $ExternalLineReference
 * @property float $Price
 * @property float $Tax
 * @property float $TotalLine
 * @property float $SH
 * @property float $SHTax
 * @property float $AdditionalSH
 * @property int|null $OverwritePriceTypeID
 * @property float|null $OverwritePriceAmount
 * @property bool|null $CreditCardCommitmentFlag
 * @property \Cake\I18n\FrozenTime|null $CCPAllocationDate
 * @property bool $DynamicKitCustomizationFlag
 * @property string|null $PricingKeycode
 * @property bool $InventoryTrackingExemptionFlag
 * @property int|null $LineContentType
 * @property bool $IsExemptFromInvoice
 * @property string|null $TaxLocationZIP
 * @property string|null $TaxLocationCity
 * @property string|null $TaxLocationCounty
 * @property string|null $TaxLocationState
 * @property string|null $TaxLocationTLD
 * @property int|null $TaxRuleMatchType
 * @property \Cake\I18n\FrozenTime|null $TaxCalculationDate
 * @property int|null $ItemID
 * @property bool $IsFileSubCodeOverride
 * @property int|null $OverwriteInventoryType
 * @property bool $IsTaxPercentOverride
 * @property int|null $ItemTypeID
 * @property string|null $ItemTypeDescription
 * @property \Cake\I18n\FrozenTime|null $StandingOrderConsideredDate
 * @property string|null $item_name
 * @property string|null $bc_product_id
 * @property string|null $bc_option_id
 * @property string|null $SizeDescription
 * @property string|null $ColorDescription
 * @property string|null $StyleDescription
 * @property int|null $SizeNumber
 * @property int|null $ColorNumber
 * @property int|null $StyleNumber
 * @property string|null $SizeId
 * @property string|null $ColorId
 * @property string|null $StyleId
 *
 * @property \App\Model\Entity\BcProduct $bc_product
 * @property \App\Model\Entity\BcOption $bc_option
 */
class Orderline extends Entity
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
        'LineStatus' => true,
        'PreHoldLineStatus' => true,
        'LineStatusDate' => true,
        'ItemCode' => true,
        'DupItemCode' => true,
        'PriceType' => true,
        'TaxPercent' => true,
        'TotalPrice' => true,
        'TotalDiscount' => true,
        'ReportDate' => true,
        'Quantity' => true,
        'Bonus' => true,
        'Size' => true,
        'Color' => true,
        'Info' => true,
        'ProcessDate' => true,
        'FileSubCode' => true,
        'FileNumber' => true,
        'Filename' => true,
        'ShipmentID' => true,
        'ShipDate' => true,
        'ReturnQuantity' => true,
        'ReturnReason' => true,
        'ReturnDate' => true,
        'RefundDate' => true,
        'RefundAmount' => true,
        'RefundType' => true,
        'RefundCheckNumber' => true,
        'RefundCreditCardFile' => true,
        'RefundCreditCardStatus' => true,
        'RefundCreditCardDate' => true,
        'TrackingNumber' => true,
        'PaymentID' => true,
        'DiscountAmount' => true,
        'ParentLineNumber' => true,
        'PriceOverwriteFlag' => true,
        'WaitDate' => true,
        'DefaultSubAgentID' => true,
        'SettlementFlagDate' => true,
        'CreateDate' => true,
        'OrderLineAdditionType' => true,
        'RecordLastUpdated' => true,
        'OriginalLineNumber' => true,
        'InvoiceDate' => true,
        'ShipmentConfirmationDate' => true,
        'TaxCodeID' => true,
        'TaxCodeExemptionID' => true,
        'FulfillmentType' => true,
        'DeliveryDate' => true,
        'PrimaryProductFlag' => true,
        'PaymentPlanID' => true,
        'ExternalLineReference' => true,
        'Price' => true,
        'Tax' => true,
        'TotalLine' => true,
        'SH' => true,
        'SHTax' => true,
        'AdditionalSH' => true,
        'OverwritePriceTypeID' => true,
        'OverwritePriceAmount' => true,
        'CreditCardCommitmentFlag' => true,
        'CCPAllocationDate' => true,
        'DynamicKitCustomizationFlag' => true,
        'PricingKeycode' => true,
        'InventoryTrackingExemptionFlag' => true,
        'LineContentType' => true,
        'IsExemptFromInvoice' => true,
        'TaxLocationZIP' => true,
        'TaxLocationCity' => true,
        'TaxLocationCounty' => true,
        'TaxLocationState' => true,
        'TaxLocationTLD' => true,
        'TaxRuleMatchType' => true,
        'TaxCalculationDate' => true,
        'ItemID' => true,
        'IsFileSubCodeOverride' => true,
        'OverwriteInventoryType' => true,
        'IsTaxPercentOverride' => true,
        'ItemTypeID' => true,
        'ItemTypeDescription' => true,
        'StandingOrderConsideredDate' => true,
        'item_name' => true,
        'bc_product_id' => true,
        'bc_option_id' => true,
        'SizeDescription' => true,
        'ColorDescription' => true,
        'StyleDescription' => true,
        'SizeNumber' => true,
        'ColorNumber' => true,
        'StyleNumber' => true,
        'SizeId' => true,
        'ColorId' => true,
        'StyleId' => true,
        'bc_product' => true,
        'bc_option' => true
    ];
}
