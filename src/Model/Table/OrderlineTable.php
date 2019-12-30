<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderline Model
 *
 * @property \App\Model\Table\BcProductsTable&\Cake\ORM\Association\BelongsTo $BcProducts
 * @property \App\Model\Table\BcOptionsTable&\Cake\ORM\Association\BelongsTo $BcOptions
 *
 * @method \App\Model\Entity\Orderline get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderline newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderline[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderline|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderline saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderline patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderline[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderline findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderlineTable extends Table
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

        $this->setTable('orderline');
        $this->setDisplayField('CID');
        $this->setPrimaryKey(['CID', 'OrderNumber', 'CustomerNumber', 'LineNumber']);

//        $this->belongsTo('BcProducts', [
//            'foreignKey' => 'bc_product_id'
//        ]);
//        $this->belongsTo('BcOptions', [
//            'foreignKey' => 'bc_option_id'
//        ]);
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('orderline');
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
            ->allowEmptyString('CID', null, 'create');

        $validator
            ->integer('OrderNumber')
            ->allowEmptyString('OrderNumber', null, 'create');

        $validator
            ->integer('CustomerNumber')
            ->allowEmptyString('CustomerNumber', null, 'create');

        $validator
            ->integer('LineNumber')
            ->allowEmptyString('LineNumber', null, 'create');

        $validator
            ->integer('LineStatus')
            ->requirePresence('LineStatus', 'create')
            ->notEmptyString('LineStatus');

        $validator
            ->integer('PreHoldLineStatus')
            ->requirePresence('PreHoldLineStatus', 'create')
            ->notEmptyString('PreHoldLineStatus');

        $validator
            ->dateTime('LineStatusDate')
            ->allowEmptyDateTime('LineStatusDate');

        $validator
            ->scalar('ItemCode')
            ->maxLength('ItemCode', 50)
            ->allowEmptyString('ItemCode');

        $validator
            ->scalar('DupItemCode')
            ->maxLength('DupItemCode', 50)
            ->allowEmptyString('DupItemCode');

        $validator
            ->scalar('PriceType')
            ->maxLength('PriceType', 1)
            ->allowEmptyString('PriceType');

        $validator
            ->numeric('TaxPercent')
            ->requirePresence('TaxPercent', 'create')
            ->notEmptyString('TaxPercent');

        $validator
            ->numeric('TotalPrice')
            ->requirePresence('TotalPrice', 'create')
            ->notEmptyString('TotalPrice');

        $validator
            ->numeric('TotalDiscount')
            ->requirePresence('TotalDiscount', 'create')
            ->notEmptyString('TotalDiscount');

        $validator
            ->dateTime('ReportDate')
            ->allowEmptyDateTime('ReportDate');

        $validator
            ->integer('Quantity')
            ->requirePresence('Quantity', 'create')
            ->notEmptyString('Quantity');

        $validator
            ->integer('Bonus')
            ->requirePresence('Bonus', 'create')
            ->notEmptyString('Bonus');

        $validator
            ->scalar('Size')
            ->maxLength('Size', 50)
            ->allowEmptyString('Size');

        $validator
            ->scalar('Color')
            ->maxLength('Color', 50)
            ->allowEmptyString('Color');

        $validator
            ->scalar('Info')
            ->maxLength('Info', 500)
            ->allowEmptyString('Info');

        $validator
            ->dateTime('ProcessDate')
            ->allowEmptyDateTime('ProcessDate');

        $validator
            ->integer('FileSubCode')
            ->requirePresence('FileSubCode', 'create')
            ->notEmptyString('FileSubCode');

        $validator
            ->integer('FileNumber')
            ->requirePresence('FileNumber', 'create')
            ->notEmptyString('FileNumber');

        $validator
            ->scalar('Filename')
            ->maxLength('Filename', 50)
            ->allowEmptyString('Filename');

        $validator
            ->integer('ShipmentID')
            ->requirePresence('ShipmentID', 'create')
            ->notEmptyString('ShipmentID');

        $validator
            ->dateTime('ShipDate')
            ->allowEmptyDateTime('ShipDate');

        $validator
            ->integer('ReturnQuantity')
            ->requirePresence('ReturnQuantity', 'create')
            ->notEmptyString('ReturnQuantity');

        $validator
            ->scalar('ReturnReason')
            ->maxLength('ReturnReason', 50)
            ->allowEmptyString('ReturnReason');

        $validator
            ->dateTime('ReturnDate')
            ->allowEmptyDateTime('ReturnDate');

        $validator
            ->dateTime('RefundDate')
            ->allowEmptyDateTime('RefundDate');

        $validator
            ->numeric('RefundAmount')
            ->requirePresence('RefundAmount', 'create')
            ->notEmptyString('RefundAmount');

        $validator
            ->scalar('RefundType')
            ->maxLength('RefundType', 50)
            ->allowEmptyString('RefundType');

        $validator
            ->scalar('RefundCheckNumber')
            ->maxLength('RefundCheckNumber', 50)
            ->allowEmptyString('RefundCheckNumber');

        $validator
            ->scalar('RefundCreditCardFile')
            ->maxLength('RefundCreditCardFile', 50)
            ->allowEmptyString('RefundCreditCardFile');

        $validator
            ->scalar('RefundCreditCardStatus')
            ->maxLength('RefundCreditCardStatus', 50)
            ->allowEmptyString('RefundCreditCardStatus');

        $validator
            ->dateTime('RefundCreditCardDate')
            ->allowEmptyDateTime('RefundCreditCardDate');

        $validator
            ->scalar('TrackingNumber')
            ->maxLength('TrackingNumber', 255)
            ->allowEmptyString('TrackingNumber');

        $validator
            ->integer('PaymentID')
            ->requirePresence('PaymentID', 'create')
            ->notEmptyString('PaymentID');

        $validator
            ->numeric('DiscountAmount')
            ->requirePresence('DiscountAmount', 'create')
            ->notEmptyString('DiscountAmount');

        $validator
            ->integer('ParentLineNumber')
            ->requirePresence('ParentLineNumber', 'create')
            ->notEmptyString('ParentLineNumber');

        $validator
            ->boolean('PriceOverwriteFlag')
            ->requirePresence('PriceOverwriteFlag', 'create')
            ->notEmptyString('PriceOverwriteFlag');

        $validator
            ->dateTime('WaitDate')
            ->allowEmptyDateTime('WaitDate');

        $validator
            ->integer('DefaultSubAgentID')
            ->allowEmptyString('DefaultSubAgentID');

        $validator
            ->dateTime('SettlementFlagDate')
            ->allowEmptyDateTime('SettlementFlagDate');

        $validator
            ->dateTime('CreateDate')
            ->allowEmptyDateTime('CreateDate');

        $validator
            ->integer('OrderLineAdditionType')
            ->allowEmptyString('OrderLineAdditionType');

        $validator
            ->dateTime('RecordLastUpdated')
            ->allowEmptyDateTime('RecordLastUpdated');

        $validator
            ->integer('OriginalLineNumber')
            ->allowEmptyString('OriginalLineNumber');

        $validator
            ->dateTime('InvoiceDate')
            ->allowEmptyDateTime('InvoiceDate');

        $validator
            ->dateTime('ShipmentConfirmationDate')
            ->allowEmptyDateTime('ShipmentConfirmationDate');

        $validator
            ->integer('TaxCodeID')
            ->allowEmptyString('TaxCodeID');

        $validator
            ->integer('TaxCodeExemptionID')
            ->allowEmptyString('TaxCodeExemptionID');

        $validator
            ->integer('FulfillmentType')
            ->allowEmptyString('FulfillmentType');

        $validator
            ->dateTime('DeliveryDate')
            ->allowEmptyDateTime('DeliveryDate');

        $validator
            ->boolean('PrimaryProductFlag')
            ->allowEmptyString('PrimaryProductFlag');

        $validator
            ->integer('PaymentPlanID')
            ->allowEmptyString('PaymentPlanID');

        $validator
            ->scalar('ExternalLineReference')
            ->maxLength('ExternalLineReference', 50)
            ->allowEmptyString('ExternalLineReference');

        $validator
            ->decimal('Price')
            ->requirePresence('Price', 'create')
            ->notEmptyString('Price');

        $validator
            ->decimal('Tax')
            ->requirePresence('Tax', 'create')
            ->notEmptyString('Tax');

        $validator
            ->decimal('TotalLine')
            ->requirePresence('TotalLine', 'create')
            ->notEmptyString('TotalLine');

        $validator
            ->decimal('SH')
            ->requirePresence('SH', 'create')
            ->notEmptyString('SH');

        $validator
            ->decimal('SHTax')
            ->requirePresence('SHTax', 'create')
            ->notEmptyString('SHTax');

        $validator
            ->decimal('AdditionalSH')
            ->requirePresence('AdditionalSH', 'create')
            ->notEmptyString('AdditionalSH');

        $validator
            ->integer('OverwritePriceTypeID')
            ->allowEmptyString('OverwritePriceTypeID');

        $validator
            ->decimal('OverwritePriceAmount')
            ->allowEmptyString('OverwritePriceAmount');

        $validator
            ->boolean('CreditCardCommitmentFlag')
            ->allowEmptyString('CreditCardCommitmentFlag');

        $validator
            ->dateTime('CCPAllocationDate')
            ->allowEmptyDateTime('CCPAllocationDate');

        $validator
            ->boolean('DynamicKitCustomizationFlag')
            ->requirePresence('DynamicKitCustomizationFlag', 'create')
            ->notEmptyString('DynamicKitCustomizationFlag');

        $validator
            ->scalar('PricingKeycode')
            ->maxLength('PricingKeycode', 20)
            ->allowEmptyString('PricingKeycode');

        $validator
            ->boolean('InventoryTrackingExemptionFlag')
            ->requirePresence('InventoryTrackingExemptionFlag', 'create')
            ->notEmptyString('InventoryTrackingExemptionFlag');

        $validator
            ->integer('LineContentType')
            ->allowEmptyString('LineContentType');

        $validator
            ->boolean('IsExemptFromInvoice')
            ->requirePresence('IsExemptFromInvoice', 'create')
            ->notEmptyString('IsExemptFromInvoice');

        $validator
            ->scalar('TaxLocationZIP')
            ->maxLength('TaxLocationZIP', 5)
            ->allowEmptyString('TaxLocationZIP');

        $validator
            ->scalar('TaxLocationCity')
            ->maxLength('TaxLocationCity', 28)
            ->allowEmptyString('TaxLocationCity');

        $validator
            ->scalar('TaxLocationCounty')
            ->maxLength('TaxLocationCounty', 25)
            ->allowEmptyString('TaxLocationCounty');

        $validator
            ->scalar('TaxLocationState')
            ->maxLength('TaxLocationState', 2)
            ->allowEmptyString('TaxLocationState');

        $validator
            ->scalar('TaxLocationTLD')
            ->maxLength('TaxLocationTLD', 2)
            ->allowEmptyString('TaxLocationTLD');

        $validator
            ->integer('TaxRuleMatchType')
            ->allowEmptyString('TaxRuleMatchType');

        $validator
            ->dateTime('TaxCalculationDate')
            ->allowEmptyDateTime('TaxCalculationDate');

        $validator
            ->integer('ItemID')
            ->allowEmptyString('ItemID');

        $validator
            ->boolean('IsFileSubCodeOverride')
            ->requirePresence('IsFileSubCodeOverride', 'create')
            ->notEmptyString('IsFileSubCodeOverride');

        $validator
            ->allowEmptyString('OverwriteInventoryType');

        $validator
            ->boolean('IsTaxPercentOverride')
            ->requirePresence('IsTaxPercentOverride', 'create')
            ->notEmptyString('IsTaxPercentOverride');

        $validator
            ->integer('ItemTypeID')
            ->allowEmptyString('ItemTypeID');

        $validator
            ->scalar('ItemTypeDescription')
            ->maxLength('ItemTypeDescription', 255)
            ->allowEmptyString('ItemTypeDescription');

        $validator
            ->dateTime('StandingOrderConsideredDate')
            ->allowEmptyDateTime('StandingOrderConsideredDate');

        $validator
            ->scalar('item_name')
            ->allowEmptyString('item_name');

        $validator
            ->scalar('SizeDescription')
            ->maxLength('SizeDescription', 120)
            ->allowEmptyString('SizeDescription');

        $validator
            ->scalar('ColorDescription')
            ->maxLength('ColorDescription', 120)
            ->allowEmptyString('ColorDescription');

        $validator
            ->scalar('StyleDescription')
            ->maxLength('StyleDescription', 120)
            ->allowEmptyString('StyleDescription');

        $validator
            ->integer('SizeNumber')
            ->allowEmptyString('SizeNumber');

        $validator
            ->integer('ColorNumber')
            ->allowEmptyString('ColorNumber');

        $validator
            ->integer('StyleNumber')
            ->allowEmptyString('StyleNumber');

        $validator
            ->scalar('SizeId')
            ->maxLength('SizeId', 50)
            ->allowEmptyString('SizeId');

        $validator
            ->scalar('ColorId')
            ->maxLength('ColorId', 50)
            ->allowEmptyString('ColorId');

        $validator
            ->scalar('StyleId')
            ->maxLength('StyleId', 50)
            ->allowEmptyString('StyleId');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['bc_product_id'], 'BcProducts'));
//        $rules->add($rules->existsIn(['bc_option_id'], 'BcOptions'));

        return $rules;
    }
    
    public function getOrders() {
        $thisTable = $this->getThisTable();
        $orderInfo = NULL;
        
        
//        $thisTable->belongsTo('centralise_product_variant',[
//            'foreignKey'=>'ItemCode',
//            'bindingKey'=>'ItemCode',
//            'joinType'=>'INNER'
//        ]);
        
        $data = $thisTable->find()
//                ->contain(['centralise_product_variant'])
                ->where(['SizeNumber IS NOT NULL'])
                ->group('ItemCode')
                ->offset(0)
                ->limit(1000)
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $orderInfo = [];
        }
        
        foreach ($results as $orderRcords){
            $orderDetails = new \App\Dto\BcOptionsDetailsDto();
            $orderDetails->itemCode = $orderRcords->ItemCode;
            $orderDetails->productId = $orderRcords->DupItemCode;
            $orderDetails->sizeLable = $orderRcords->SizeDescription;
            $orderDetails->colorLable = $orderRcords->ColorDescription;
            $orderDetails->styleLable = $orderRcords->StyleDescription;
            $orderDetails->sizeNumber = $orderRcords->SizeNumber;
            $orderDetails->colorNumber = $orderRcords->ColorNumber;
            $orderDetails->styleNumber = $orderRcords->StyleNumber;
            array_push($orderInfo, $orderDetails);
        }
        
        return $orderInfo;
        
    }
    
    public function updateOrdersOptionId($itemCode,$sizeInfo,$colorInfo,$styleInfo) {
        $thisTable = $this->getThisTable();
        $orderInfo = NULL;
        
        
        
        $data = $thisTable->find()
//                ->contain(['centralise_product_variant'])
                ->where(['ItemCode'=>$itemCode])
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $orderInfo = [];
        }
        
        foreach ($results as $orderRcords){
            $orderRcords->SizeId = $sizeInfo;
            $orderRcords->ColorId = $colorInfo;
            $orderRcords->StyleId = $styleInfo;
        }
        $thisTable->saveMany($results);
        
    }
}
