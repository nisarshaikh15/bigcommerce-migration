<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Item Model
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('item');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('item');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('CID')
            ->requirePresence('CID', 'create')
            ->notEmptyString('CID');

        $validator
            ->scalar('ItemCode')
            ->maxLength('ItemCode', 50)
            ->requirePresence('ItemCode', 'create')
            ->notEmptyString('ItemCode');

        $validator
            ->requirePresence('HasChildren', 'create')
            ->notEmptyString('HasChildren');

        $validator
            ->scalar('ParentItemCode')
            ->maxLength('ParentItemCode', 50)
            ->allowEmptyString('ParentItemCode');

        $validator
            ->scalar('ProductName')
            ->maxLength('ProductName', 200)
            ->allowEmptyString('ProductName');

        $validator
            ->integer('CatalogPage')
            ->requirePresence('CatalogPage', 'create')
            ->notEmptyString('CatalogPage');

        $validator
            ->scalar('SizeLabel')
            ->maxLength('SizeLabel', 120)
            ->allowEmptyString('SizeLabel');

        $validator
            ->integer('SizeCode')
            ->requirePresence('SizeCode', 'create')
            ->notEmptyString('SizeCode');

        $validator
            ->scalar('SizeDescription')
            ->maxLength('SizeDescription', 120)
            ->allowEmptyString('SizeDescription');

        $validator
            ->decimal('SizeSurcharge')
            ->requirePresence('SizeSurcharge', 'create')
            ->notEmptyString('SizeSurcharge');

        $validator
            ->scalar('ColorLabel')
            ->maxLength('ColorLabel', 120)
            ->allowEmptyString('ColorLabel');

        $validator
            ->integer('ColorCode')
            ->requirePresence('ColorCode', 'create')
            ->notEmptyString('ColorCode');

        $validator
            ->scalar('ColorDescription')
            ->maxLength('ColorDescription', 120)
            ->allowEmptyString('ColorDescription');

        $validator
            ->decimal('ColorSurcharge')
            ->requirePresence('ColorSurcharge', 'create')
            ->notEmptyString('ColorSurcharge');

        $validator
            ->scalar('StyleLabel')
            ->maxLength('StyleLabel', 120)
            ->allowEmptyString('StyleLabel');

        $validator
            ->integer('StyleCode')
            ->requirePresence('StyleCode', 'create')
            ->notEmptyString('StyleCode');

        $validator
            ->scalar('StyleDescription')
            ->maxLength('StyleDescription', 120)
            ->allowEmptyString('StyleDescription');

        $validator
            ->decimal('StyleSurcharge')
            ->requirePresence('StyleSurcharge', 'create')
            ->notEmptyString('StyleSurcharge');

        $validator
            ->integer('ProductType')
            ->requirePresence('ProductType', 'create')
            ->notEmptyString('ProductType');

        $validator
            ->integer('InterestCode')
            ->requirePresence('InterestCode', 'create')
            ->notEmptyString('InterestCode');

        $validator
            ->scalar('PickLocation')
            ->maxLength('PickLocation', 255)
            ->allowEmptyString('PickLocation');

        $validator
            ->scalar('UnitOfMeasure')
            ->maxLength('UnitOfMeasure', 50)
            ->allowEmptyString('UnitOfMeasure');

        $validator
            ->dateTime('LaunchDate')
            ->allowEmptyDateTime('LaunchDate');

        $validator
            ->requirePresence('ProductStatus', 'create')
            ->notEmptyString('ProductStatus');

        $validator
            ->requirePresence('InventoryProductFlag', 'create')
            ->notEmptyString('InventoryProductFlag');

        $validator
            ->requirePresence('InventoryWarnin;OI', 'create')
            ->notEmptyString('InventoryWarnin;OI');

        $validator
            ->requirePresence('InventoryWarningLOI', 'create')
            ->notEmptyString('InventoryWarningLOI');

        $validator
            ->integer('InventoryThreshholdQty')
            ->requirePresence('InventoryThreshholdQty', 'create')
            ->notEmptyString('InventoryThreshholdQty');

        $validator
            ->numeric('InventoryThreshhold')
            ->requirePresence('InventoryThreshhold', 'create')
            ->notEmptyString('InventoryThreshhold');

        $validator
            ->dateTime('NextExpectedDeliveryDate')
            ->allowEmptyDateTime('NextExpectedDeliveryDate');

        $validator
            ->requirePresence('OrderSplitFlag', 'create')
            ->notEmptyString('OrderSplitFlag');

        $validator
            ->decimal('CostOf;ods')
            ->requirePresence('CostOf;ods', 'create')
            ->notEmptyString('CostOf;ods');

        $validator
            ->numeric('RoyaltyPercent')
            ->requirePresence('RoyaltyPercent', 'create')
            ->notEmptyString('RoyaltyPercent');

        $validator
            ->numeric('Weight')
            ->requirePresence('Weight', 'create')
            ->notEmptyString('Weight');

        $validator
            ->numeric('Height')
            ->requirePresence('Height', 'create')
            ->notEmptyString('Height');

        $validator
            ->numeric('Width')
            ->requirePresence('Width', 'create')
            ->notEmptyString('Width');

        $validator
            ->numeric('Depth')
            ->requirePresence('Depth', 'create')
            ->notEmptyString('Depth');

        $validator
            ->scalar('OriginCountry')
            ->maxLength('OriginCountry', 2)
            ->allowEmptyString('OriginCountry');

        $validator
            ->scalar('UPCCode')
            ->maxLength('UPCCode', 20)
            ->allowEmptyString('UPCCode');

        $validator
            ->scalar('ISBNNumber')
            ->maxLength('ISBNNumber', 50)
            ->allowEmptyString('ISBNNumber');

        $validator
            ->scalar('AccountingReference')
            ->maxLength('AccountingReference', 255)
            ->allowEmptyString('AccountingReference');

        $validator
            ->scalar('CustomsTariff')
            ->maxLength('CustomsTariff', 30)
            ->allowEmptyString('CustomsTariff');

        $validator
            ->requirePresence('TaxExemptException', 'create')
            ->notEmptyString('TaxExemptException');

        $validator
            ->scalar('TaxState1')
            ->maxLength('TaxState1', 2)
            ->allowEmptyString('TaxState1');

        $validator
            ->numeric('TaxPercent1')
            ->requirePresence('TaxPercent1', 'create')
            ->notEmptyString('TaxPercent1');

        $validator
            ->scalar('TaxState2')
            ->maxLength('TaxState2', 2)
            ->allowEmptyString('TaxState2');

        $validator
            ->numeric('TaxPercent2')
            ->requirePresence('TaxPercent2', 'create')
            ->notEmptyString('TaxPercent2');

        $validator
            ->scalar('TaxState3')
            ->maxLength('TaxState3', 2)
            ->allowEmptyString('TaxState3');

        $validator
            ->numeric('TaxPercent3')
            ->requirePresence('TaxPercent3', 'create')
            ->notEmptyString('TaxPercent3');

        $validator
            ->scalar('TaxState4')
            ->maxLength('TaxState4', 2)
            ->allowEmptyString('TaxState4');

        $validator
            ->numeric('TaxPercent4')
            ->requirePresence('TaxPercent4', 'create')
            ->notEmptyString('TaxPercent4');

        $validator
            ->scalar('TaxState5')
            ->maxLength('TaxState5', 2)
            ->allowEmptyString('TaxState5');

        $validator
            ->numeric('TaxPercent5')
            ->requirePresence('TaxPercent5', 'create')
            ->notEmptyString('TaxPercent5');

        $validator
            ->requirePresence('ForceQuantity', 'create')
            ->notEmptyString('ForceQuantity');

        $validator
            ->scalar('PriceType')
            ->maxLength('PriceType', 1)
            ->allowEmptyString('PriceType');

        $validator
            ->integer('Qty1')
            ->requirePresence('Qty1', 'create')
            ->notEmptyString('Qty1');

        $validator
            ->numeric('Price1')
            ->requirePresence('Price1', 'create')
            ->notEmptyString('Price1');

        $validator
            ->integer('Qty2')
            ->requirePresence('Qty2', 'create')
            ->notEmptyString('Qty2');

        $validator
            ->numeric('Price2')
            ->requirePresence('Price2', 'create')
            ->notEmptyString('Price2');

        $validator
            ->integer('Qty3')
            ->requirePresence('Qty3', 'create')
            ->notEmptyString('Qty3');

        $validator
            ->numeric('Price3')
            ->requirePresence('Price3', 'create')
            ->notEmptyString('Price3');

        $validator
            ->integer('Qty4')
            ->requirePresence('Qty4', 'create')
            ->notEmptyString('Qty4');

        $validator
            ->numeric('Price4')
            ->requirePresence('Price4', 'create')
            ->notEmptyString('Price4');

        $validator
            ->integer('Qty5')
            ->requirePresence('Qty5', 'create')
            ->notEmptyString('Qty5');

        $validator
            ->numeric('Price5')
            ->requirePresence('Price5', 'create')
            ->notEmptyString('Price5');

        $validator
            ->integer('OnHand')
            ->requirePresence('OnHand', 'create')
            ->notEmptyString('OnHand');

        $validator
            ->integer('OnOrder')
            ->requirePresence('OnOrder', 'create')
            ->notEmptyString('OnOrder');

        $validator
            ->scalar('InfoText')
            ->allowEmptyString('InfoText');

        $validator
            ->scalar('InfoTextHTML')
            ->allowEmptyString('InfoTextHTML');

        $validator
            ->integer('TotalShipped')
            ->requirePresence('TotalShipped', 'create')
            ->notEmptyString('TotalShipped');

        $validator
            ->dateTime('FirstOrderDate')
            ->allowEmptyDateTime('FirstOrderDate');

        $validator
            ->dateTime('LastOrderDate')
            ->allowEmptyDateTime('LastOrderDate');

        $validator
            ->integer('Last30DaysOrdered')
            ->requirePresence('Last30DaysOrdered', 'create')
            ->notEmptyString('Last30DaysOrdered');

        $validator
            ->scalar('ImageURL')
            ->maxLength('ImageURL', 255)
            ->allowEmptyString('ImageURL');

        $validator
            ->scalar('ImageURLThumbnail')
            ->maxLength('ImageURLThumbnail', 255)
            ->allowEmptyString('ImageURLThumbnail');

        $validator
            ->scalar('ImageFile')
            ->maxLength('ImageFile', 30)
            ->allowEmptyString('ImageFile');

        $validator
            ->integer('ImageWidth')
            ->requirePresence('ImageWidth', 'create')
            ->notEmptyString('ImageWidth');

        $validator
            ->integer('ImageHeight')
            ->requirePresence('ImageHeight', 'create')
            ->notEmptyString('ImageHeight');

        $validator
            ->scalar('ImageType')
            ->maxLength('ImageType', 50)
            ->allowEmptyString('ImageType');

        $validator
            ->integer('ImageSize')
            ->requirePresence('ImageSize', 'create')
            ->notEmptyString('ImageSize');

        $validator
            ->scalar('InventoryManager')
            ->maxLength('InventoryManager', 50)
            ->allowEmptyString('InventoryManager');

        $validator
            ->integer('FileSubCode')
            ->requirePresence('FileSubCode', 'create')
            ->notEmptyString('FileSubCode');

        $validator
            ->requirePresence('SubscriptionFlag', 'create')
            ->notEmptyString('SubscriptionFlag');

        $validator
            ->integer('SubscriptionDuration')
            ->requirePresence('SubscriptionDuration', 'create')
            ->notEmptyString('SubscriptionDuration');

        $validator
            ->integer('SubscriptionUnit')
            ->requirePresence('SubscriptionUnit', 'create')
            ->notEmptyString('SubscriptionUnit');

        $validator
            ->scalar('FulfillmentInstructions')
            ->maxLength('FulfillmentInstructions', 1000)
            ->allowEmptyString('FulfillmentInstructions');

        $validator
            ->integer('ProductDuration')
            ->requirePresence('ProductDuration', 'create')
            ->notEmptyString('ProductDuration');

        $validator
            ->integer('ProductDurationUnit')
            ->requirePresence('ProductDurationUnit', 'create')
            ->notEmptyString('ProductDurationUnit');

        $validator
            ->integer('DiscountType')
            ->requirePresence('DiscountType', 'create')
            ->notEmptyString('DiscountType');

        $validator
            ->decimal('DiscountPercent')
            ->requirePresence('DiscountPercent', 'create')
            ->notEmptyString('DiscountPercent');

        $validator
            ->requirePresence('CollectionFlag', 'create')
            ->notEmptyString('CollectionFlag');

        $validator
            ->requirePresence('AllowOrderLineInfo', 'create')
            ->notEmptyString('AllowOrderLineInfo');

        $validator
            ->scalar('OrderLineInfoLabel')
            ->maxLength('OrderLineInfoLabel', 50)
            ->allowEmptyString('OrderLineInfoLabel');

        $validator
            ->decimal('AverageCost')
            ->allowEmptyString('AverageCost');

        $validator
            ->allowEmptyString('AlwaysShipFlag');

        $validator
            ->requirePresence('ShipAloneFlag', 'create')
            ->notEmptyString('ShipAloneFlag');

        $validator
            ->requirePresence('OversizeFlag', 'create')
            ->notEmptyString('OversizeFlag');

        $validator
            ->scalar('PickZone')
            ->maxLength('PickZone', 20)
            ->allowEmptyString('PickZone');

        $validator
            ->scalar('PickAisle')
            ->maxLength('PickAisle', 20)
            ->allowEmptyString('PickAisle');

        $validator
            ->scalar('PickShelf')
            ->maxLength('PickShelf', 20)
            ->allowEmptyString('PickShelf');

        $validator
            ->dateTime('WaitDate')
            ->allowEmptyDateTime('WaitDate');

        $validator
            ->scalar('WarehouseReference')
            ->maxLength('WarehouseReference', 50)
            ->allowEmptyString('WarehouseReference');

        $validator
            ->numeric('ShippingWeight')
            ->allowEmptyString('ShippingWeight');

        $validator
            ->integer('ItemType')
            ->requirePresence('ItemType', 'create')
            ->notEmptyString('ItemType');

        $validator
            ->integer('TaxCodeID')
            ->allowEmptyString('TaxCodeID');

        $validator
            ->integer('InventoryType')
            ->requirePresence('InventoryType', 'create')
            ->notEmptyString('InventoryType');

        $validator
            ->requirePresence('PaymentPlanRequired', 'create')
            ->notEmptyString('PaymentPlanRequired');

        $validator
            ->integer('DefaultPaymentPlanID')
            ->allowEmptyString('DefaultPaymentPlanID');

        $validator
            ->requirePresence('IncompleteFlag', 'create')
            ->notEmptyString('IncompleteFlag');

        $validator
            ->dateTime('RecordLastUpdated')
            ->allowEmptyDateTime('RecordLastUpdated');

        $validator
            ->scalar('SingleColumnPK')
            ->maxLength('SingleColumnPK', 61)
            ->requirePresence('SingleColumnPK', 'create')
            ->notEmptyString('SingleColumnPK');

        $validator
            ->integer('CCPAllocatedQuantity')
            ->allowEmptyString('CCPAllocatedQuantity');

        $validator
            ->integer('DefaultSHPolicyID')
            ->allowEmptyString('DefaultSHPolicyID');

        $validator
            ->requirePresence('IsKeycodeSHOverride', 'create')
            ->notEmptyString('IsKeycodeSHOverride');

        $validator
            ->requirePresence('HasPaymentPlanInvoiceDelay', 'create')
            ->notEmptyString('HasPaymentPlanInvoiceDelay');

        $validator
            ->integer('OnHandWarehouseTotal')
            ->requirePresence('OnHandWarehouseTotal', 'create')
            ->notEmptyString('OnHandWarehouseTotal');

        $validator
            ->integer('OnHandWarehouseSaleable')
            ->requirePresence('OnHandWarehouseSaleable', 'create')
            ->notEmptyString('OnHandWarehouseSaleable');

        $validator
            ->integer('ToShip')
            ->requirePresence('ToShip', 'create')
            ->notEmptyString('ToShip');

        $validator
            ->integer('ToShipWarehouse')
            ->requirePresence('ToShipWarehouse', 'create')
            ->notEmptyString('ToShipWarehouse');

        $validator
            ->integer('ToShipCreditCard')
            ->requirePresence('ToShipCreditCard', 'create')
            ->notEmptyString('ToShipCreditCard');

        $validator
            ->integer('ItemId')
            ->allowEmptyString('ItemId');

        $validator
            ->requirePresence('SizeSurchargeType', 'create')
            ->notEmptyString('SizeSurchargeType');

        $validator
            ->requirePresence('ColorSurchargeType', 'create')
            ->notEmptyString('ColorSurchargeType');

        $validator
            ->requirePresence('StyleSurchargeType', 'create')
            ->notEmptyString('StyleSurchargeType');

        $validator
            ->requirePresence('RestrictReplacement', 'create')
            ->notEmptyString('RestrictReplacement');

        $validator
            ->requirePresence('RestrictExchange', 'create')
            ->notEmptyString('RestrictExchange');

        return $validator;
    }
    
    public function getVariationData() {
        $thisTable = $this->getThisTable();
        $variations = NULL;
        $num = 10000;
        $thisTable->belongsTo('yahoo_product_catalog', [
            'foreignKey' => 'ParentItemCode',
            'bindingKey' => 'ItemCode',
            'joinType' => 'INNER']);
        
        $dbItem = $thisTable->find()
                ->contain(['yahoo_product_catalog'])
                ->select(['ItemCode','ParentItemCode','ProductName','SizeCode','SizeDescription',
                    'ColorCode','ColorDescription','StyleCode','StyleDescription','InfoText','ItemId','Path'=>'yahoo_product_catalog.Path','ProductStatus'])
                ->offset(19*$num)
                ->limit($num)
                ->all();
        
        $results = $dbItem->toArray();
        
        if(count($results)>0){
            $variations = [];
        }
        foreach ($results as $vareationRecord) {
            $variationInfo = new \App\Dto\VariationInfo();
            $variationInfo->colorCode = $vareationRecord->ColorCode;
            $variationInfo->colorDescription = $vareationRecord->ColorDescription;
            $variationInfo->infoText = $vareationRecord->InfoText;
            $variationInfo->itemCode = $vareationRecord->ItemCode;
            $variationInfo->itemId = $vareationRecord->ItemId;
            $variationInfo->parentItemCode = $vareationRecord->ParentItemCode;
            $variationInfo->path = $vareationRecord->Path;
            $variationInfo->productName = $vareationRecord->ProductName;
            $variationInfo->productStatus = $vareationRecord->ProductStatus;
            $variationInfo->sizeCode = $vareationRecord->SizeCode;
            $variationInfo->sizeDescription = $vareationRecord->SizeDescription;
            $variationInfo->styleCode = $vareationRecord->StyleCode;
            $variationInfo->styleDescription = $vareationRecord->StyleDescription;
            array_push($variations, $variationInfo);
        }
        return $variations;
    }
}
