<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $CID
 * @property string $ItemCode
 * @property int $HasChildren
 * @property string|null $ParentItemCode
 * @property string|null $ProductName
 * @property int $CatalogPage
 * @property string|null $SizeLabel
 * @property int $SizeCode
 * @property string|null $SizeDescription
 * @property float $SizeSurcharge
 * @property string|null $ColorLabel
 * @property int $ColorCode
 * @property string|null $ColorDescription
 * @property float $ColorSurcharge
 * @property string|null $StyleLabel
 * @property int $StyleCode
 * @property string|null $StyleDescription
 * @property float $StyleSurcharge
 * @property int $ProductType
 * @property int $InterestCode
 * @property string|null $PickLocation
 * @property string|null $UnitOfMeasure
 * @property \Cake\I18n\FrozenTime|null $LaunchDate
 * @property int $ProductStatus
 * @property int $InventoryProductFlag
 * @property int $InventoryWarnin;OI
 * @property int $InventoryWarningLOI
 * @property int $InventoryThreshholdQty
 * @property float $InventoryThreshhold
 * @property \Cake\I18n\FrozenTime|null $NextExpectedDeliveryDate
 * @property int $OrderSplitFlag
 * @property float $CostOf;ods
 * @property float $RoyaltyPercent
 * @property float $Weight
 * @property float $Height
 * @property float $Width
 * @property float $Depth
 * @property string|null $OriginCountry
 * @property string|null $UPCCode
 * @property string|null $ISBNNumber
 * @property string|null $AccountingReference
 * @property string|null $CustomsTariff
 * @property int $TaxExemptException
 * @property string|null $TaxState1
 * @property float $TaxPercent1
 * @property string|null $TaxState2
 * @property float $TaxPercent2
 * @property string|null $TaxState3
 * @property float $TaxPercent3
 * @property string|null $TaxState4
 * @property float $TaxPercent4
 * @property string|null $TaxState5
 * @property float $TaxPercent5
 * @property int $ForceQuantity
 * @property string|null $PriceType
 * @property int $Qty1
 * @property float $Price1
 * @property int $Qty2
 * @property float $Price2
 * @property int $Qty3
 * @property float $Price3
 * @property int $Qty4
 * @property float $Price4
 * @property int $Qty5
 * @property float $Price5
 * @property int $OnHand
 * @property int $OnOrder
 * @property string|null $InfoText
 * @property string|null $InfoTextHTML
 * @property int $TotalShipped
 * @property \Cake\I18n\FrozenTime|null $FirstOrderDate
 * @property \Cake\I18n\FrozenTime|null $LastOrderDate
 * @property int $Last30DaysOrdered
 * @property string|null $ImageURL
 * @property string|null $ImageURLThumbnail
 * @property string|null $ImageFile
 * @property int $ImageWidth
 * @property int $ImageHeight
 * @property string|null $ImageType
 * @property int $ImageSize
 * @property string|null $InventoryManager
 * @property int $FileSubCode
 * @property int $SubscriptionFlag
 * @property int $SubscriptionDuration
 * @property int $SubscriptionUnit
 * @property string|null $FulfillmentInstructions
 * @property int $ProductDuration
 * @property int $ProductDurationUnit
 * @property int $DiscountType
 * @property float $DiscountPercent
 * @property int $CollectionFlag
 * @property int $AllowOrderLineInfo
 * @property string|null $OrderLineInfoLabel
 * @property float|null $AverageCost
 * @property int|null $AlwaysShipFlag
 * @property int $ShipAloneFlag
 * @property int $OversizeFlag
 * @property string|null $PickZone
 * @property string|null $PickAisle
 * @property string|null $PickShelf
 * @property \Cake\I18n\FrozenTime|null $WaitDate
 * @property string|null $WarehouseReference
 * @property float|null $ShippingWeight
 * @property int $ItemType
 * @property int|null $TaxCodeID
 * @property int $InventoryType
 * @property int $PaymentPlanRequired
 * @property int|null $DefaultPaymentPlanID
 * @property int $IncompleteFlag
 * @property \Cake\I18n\FrozenTime|null $RecordLastUpdated
 * @property string $SingleColumnPK
 * @property int|null $CCPAllocatedQuantity
 * @property int|null $DefaultSHPolicyID
 * @property int $IsKeycodeSHOverride
 * @property int $HasPaymentPlanInvoiceDelay
 * @property int $OnHandWarehouseTotal
 * @property int $OnHandWarehouseSaleable
 * @property int $ToShip
 * @property int $ToShipWarehouse
 * @property int $ToShipCreditCard
 * @property int|null $ItemId
 * @property int $SizeSurchargeType
 * @property int $ColorSurchargeType
 * @property int $StyleSurchargeType
 * @property int $RestrictReplacement
 * @property int $RestrictExchange
 */
class Item extends Entity
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
        'CID' => true,
        'ItemCode' => true,
        'HasChildren' => true,
        'ParentItemCode' => true,
        'ProductName' => true,
        'CatalogPage' => true,
        'SizeLabel' => true,
        'SizeCode' => true,
        'SizeDescription' => true,
        'SizeSurcharge' => true,
        'ColorLabel' => true,
        'ColorCode' => true,
        'ColorDescription' => true,
        'ColorSurcharge' => true,
        'StyleLabel' => true,
        'StyleCode' => true,
        'StyleDescription' => true,
        'StyleSurcharge' => true,
        'ProductType' => true,
        'InterestCode' => true,
        'PickLocation' => true,
        'UnitOfMeasure' => true,
        'LaunchDate' => true,
        'ProductStatus' => true,
        'InventoryProductFlag' => true,
        'InventoryWarnin;OI' => true,
        'InventoryWarningLOI' => true,
        'InventoryThreshholdQty' => true,
        'InventoryThreshhold' => true,
        'NextExpectedDeliveryDate' => true,
        'OrderSplitFlag' => true,
        'CostOf;ods' => true,
        'RoyaltyPercent' => true,
        'Weight' => true,
        'Height' => true,
        'Width' => true,
        'Depth' => true,
        'OriginCountry' => true,
        'UPCCode' => true,
        'ISBNNumber' => true,
        'AccountingReference' => true,
        'CustomsTariff' => true,
        'TaxExemptException' => true,
        'TaxState1' => true,
        'TaxPercent1' => true,
        'TaxState2' => true,
        'TaxPercent2' => true,
        'TaxState3' => true,
        'TaxPercent3' => true,
        'TaxState4' => true,
        'TaxPercent4' => true,
        'TaxState5' => true,
        'TaxPercent5' => true,
        'ForceQuantity' => true,
        'PriceType' => true,
        'Qty1' => true,
        'Price1' => true,
        'Qty2' => true,
        'Price2' => true,
        'Qty3' => true,
        'Price3' => true,
        'Qty4' => true,
        'Price4' => true,
        'Qty5' => true,
        'Price5' => true,
        'OnHand' => true,
        'OnOrder' => true,
        'InfoText' => true,
        'InfoTextHTML' => true,
        'TotalShipped' => true,
        'FirstOrderDate' => true,
        'LastOrderDate' => true,
        'Last30DaysOrdered' => true,
        'ImageURL' => true,
        'ImageURLThumbnail' => true,
        'ImageFile' => true,
        'ImageWidth' => true,
        'ImageHeight' => true,
        'ImageType' => true,
        'ImageSize' => true,
        'InventoryManager' => true,
        'FileSubCode' => true,
        'SubscriptionFlag' => true,
        'SubscriptionDuration' => true,
        'SubscriptionUnit' => true,
        'FulfillmentInstructions' => true,
        'ProductDuration' => true,
        'ProductDurationUnit' => true,
        'DiscountType' => true,
        'DiscountPercent' => true,
        'CollectionFlag' => true,
        'AllowOrderLineInfo' => true,
        'OrderLineInfoLabel' => true,
        'AverageCost' => true,
        'AlwaysShipFlag' => true,
        'ShipAloneFlag' => true,
        'OversizeFlag' => true,
        'PickZone' => true,
        'PickAisle' => true,
        'PickShelf' => true,
        'WaitDate' => true,
        'WarehouseReference' => true,
        'ShippingWeight' => true,
        'ItemType' => true,
        'TaxCodeID' => true,
        'InventoryType' => true,
        'PaymentPlanRequired' => true,
        'DefaultPaymentPlanID' => true,
        'IncompleteFlag' => true,
        'RecordLastUpdated' => true,
        'SingleColumnPK' => true,
        'CCPAllocatedQuantity' => true,
        'DefaultSHPolicyID' => true,
        'IsKeycodeSHOverride' => true,
        'HasPaymentPlanInvoiceDelay' => true,
        'OnHandWarehouseTotal' => true,
        'OnHandWarehouseSaleable' => true,
        'ToShip' => true,
        'ToShipWarehouse' => true,
        'ToShipCreditCard' => true,
        'ItemId' => true,
        'SizeSurchargeType' => true,
        'ColorSurchargeType' => true,
        'StyleSurchargeType' => true,
        'RestrictReplacement' => true,
        'RestrictExchange' => true
    ];
}
