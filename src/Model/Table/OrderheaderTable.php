<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderheader Model
 *
 * @method \App\Model\Entity\Orderheader get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderheader newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderheader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderheader|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderheader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderheader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderheader[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderheader findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderheaderTable extends Table
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

        $this->setTable('orderheader');
        $this->setDisplayField('CID');
        $this->setPrimaryKey(['CID', 'OrderNumber', 'CustomerNumber']);
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('orderheader');
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
            ->dateTime('BatchMonth')
            ->allowEmptyDateTime('BatchMonth');

        $validator
            ->integer('BatchNumber')
            ->requirePresence('BatchNumber', 'create')
            ->notEmptyString('BatchNumber');

        $validator
            ->scalar('OriginType')
            ->maxLength('OriginType', 1)
            ->allowEmptyString('OriginType');

        $validator
            ->scalar('KeyCode')
            ->maxLength('KeyCode', 50)
            ->allowEmptyString('KeyCode');

        $validator
            ->integer('FollowUpID')
            ->requirePresence('FollowUpID', 'create')
            ->notEmptyString('FollowUpID');

        $validator
            ->scalar('SiteID')
            ->maxLength('SiteID', 10)
            ->allowEmptyString('SiteID');

        $validator
            ->scalar('ClickID')
            ->maxLength('ClickID', 10)
            ->allowEmptyString('ClickID');

        $validator
            ->scalar('StoreCode')
            ->maxLength('StoreCode', 50)
            ->allowEmptyString('StoreCode');

        $validator
            ->scalar('OrderID')
            ->maxLength('OrderID', 100)
            ->allowEmptyString('OrderID');

        $validator
            ->dateTime('KeyedDate')
            ->allowEmptyDateTime('KeyedDate');

        $validator
            ->integer('PaymentType')
            ->requirePresence('PaymentType', 'create')
            ->notEmptyString('PaymentType');

        $validator
            ->scalar('CheckNumber')
            ->maxLength('CheckNumber', 15)
            ->allowEmptyString('CheckNumber');

        $validator
            ->scalar('CreditCardNumber')
            ->maxLength('CreditCardNumber', 500)
            ->allowEmptyString('CreditCardNumber');

        $validator
            ->integer('CreditCardType')
            ->requirePresence('CreditCardType', 'create')
            ->notEmptyString('CreditCardType');

        $validator
            ->date('CreditCardExpDate')
            ->allowEmptyDate('CreditCardExpDate');

        $validator
            ->integer('CreditCardStatus')
            ->requirePresence('CreditCardStatus', 'create')
            ->notEmptyString('CreditCardStatus');

        $validator
            ->dateTime('CreditCardChargeDate')
            ->allowEmptyDateTime('CreditCardChargeDate');

        $validator
            ->integer('CreditCardChargeAttempt')
            ->requirePresence('CreditCardChargeAttempt', 'create')
            ->notEmptyString('CreditCardChargeAttempt');

        $validator
            ->scalar('CreditCardFile')
            ->maxLength('CreditCardFile', 50)
            ->allowEmptyString('CreditCardFile');

        $validator
            ->integer('CreditCardInstallments')
            ->requirePresence('CreditCardInstallments', 'create')
            ->notEmptyString('CreditCardInstallments');

        $validator
            ->integer('CreditCardInstallmentsProcessed')
            ->requirePresence('CreditCardInstallmentsProcessed', 'create')
            ->notEmptyString('CreditCardInstallmentsProcessed');

        $validator
            ->scalar('CreditCardAuthCode')
            ->maxLength('CreditCardAuthCode', 20)
            ->allowEmptyString('CreditCardAuthCode');

        $validator
            ->integer('CreditCardAuthStatus')
            ->requirePresence('CreditCardAuthStatus', 'create')
            ->notEmptyString('CreditCardAuthStatus');

        $validator
            ->dateTime('CreditCardAuthRequestDate')
            ->allowEmptyDateTime('CreditCardAuthRequestDate');

        $validator
            ->scalar('CreditCardAuthRequestID')
            ->maxLength('CreditCardAuthRequestID', 50)
            ->allowEmptyString('CreditCardAuthRequestID');

        $validator
            ->dateTime('CreditCardAuthDate')
            ->allowEmptyDateTime('CreditCardAuthDate');

        $validator
            ->integer('CreditCardAuthAttempt')
            ->requirePresence('CreditCardAuthAttempt', 'create')
            ->notEmptyString('CreditCardAuthAttempt');

        $validator
            ->scalar('CreditCardAuthFile')
            ->maxLength('CreditCardAuthFile', 50)
            ->allowEmptyString('CreditCardAuthFile');

        $validator
            ->scalar('CreditCardAVSResult')
            ->maxLength('CreditCardAVSResult', 6)
            ->allowEmptyString('CreditCardAVSResult');

        $validator
            ->scalar('CreditCardCCVResult')
            ->maxLength('CreditCardCCVResult', 6)
            ->allowEmptyString('CreditCardCCVResult');

        $validator
            ->scalar('BankRoutingNumber')
            ->maxLength('BankRoutingNumber', 20)
            ->allowEmptyString('BankRoutingNumber');

        $validator
            ->scalar('BankAccountNumber')
            ->maxLength('BankAccountNumber', 255)
            ->allowEmptyString('BankAccountNumber');

        $validator
            ->dateTime('LastPayDate')
            ->allowEmptyDateTime('LastPayDate');

        $validator
            ->dateTime('ReportDate')
            ->allowEmptyDateTime('ReportDate');

        $validator
            ->numeric('SHTaxPercent')
            ->requirePresence('SHTaxPercent', 'create')
            ->notEmptyString('SHTaxPercent');

        $validator
            ->integer('SHCode')
            ->requirePresence('SHCode', 'create')
            ->notEmptyString('SHCode');

        $validator
            ->scalar('IP')
            ->maxLength('IP', 50)
            ->allowEmptyString('IP');

        $validator
            ->scalar('OS')
            ->maxLength('OS', 50)
            ->allowEmptyString('OS');

        $validator
            ->scalar('IPChange')
            ->maxLength('IPChange', 50)
            ->allowEmptyString('IPChange');

        $validator
            ->scalar('OSChange')
            ->maxLength('OSChange', 50)
            ->allowEmptyString('OSChange');

        $validator
            ->scalar('PIN')
            ->maxLength('PIN', 50)
            ->allowEmptyString('PIN');

        $validator
            ->numeric('Time')
            ->requirePresence('Time', 'create')
            ->notEmptyString('Time');

        $validator
            ->boolean('GiftWrapping')
            ->requirePresence('GiftWrapping', 'create')
            ->notEmptyString('GiftWrapping');

        $validator
            ->scalar('Username')
            ->maxLength('Username', 50)
            ->allowEmptyString('Username');

        $validator
            ->integer('PaymentPlanID')
            ->requirePresence('PaymentPlanID', 'create')
            ->notEmptyString('PaymentPlanID');

        $validator
            ->scalar('OverwriteKeycode')
            ->maxLength('OverwriteKeycode', 20)
            ->allowEmptyString('OverwriteKeycode');

        $validator
            ->dateTime('OrderDate')
            ->allowEmptyDateTime('OrderDate');

        $validator
            ->scalar('Reference')
            ->maxLength('Reference', 255)
            ->allowEmptyString('Reference');

        $validator
            ->integer('AiringID')
            ->allowEmptyString('AiringID');

        $validator
            ->date('CreditCardStartDate')
            ->allowEmptyDate('CreditCardStartDate');

        $validator
            ->scalar('CreditCardIssueNumber')
            ->maxLength('CreditCardIssueNumber', 255)
            ->allowEmptyString('CreditCardIssueNumber');

        $validator
            ->dateTime('QuoteExpiryDate')
            ->allowEmptyDateTime('QuoteExpiryDate');

        $validator
            ->integer('OrderType')
            ->requirePresence('OrderType', 'create')
            ->notEmptyString('OrderType');

        $validator
            ->integer('CreditCardSearch')
            ->allowEmptyString('CreditCardSearch');

        $validator
            ->scalar('DNIS')
            ->maxLength('DNIS', 10)
            ->allowEmptyString('DNIS');

        $validator
            ->dateTime('RecordLastUpdated')
            ->allowEmptyDateTime('RecordLastUpdated');

        $validator
            ->requirePresence('OrderFacilityID', 'create')
            ->notEmptyString('OrderFacilityID');

        $validator
            ->integer('OrderStatus')
            ->allowEmptyString('OrderStatus');

        $validator
            ->integer('CurrentPaymentCollectionsID')
            ->allowEmptyString('CurrentPaymentCollectionsID');

        $validator
            ->integer('CurrentPaymentCollectionsCycle')
            ->allowEmptyString('CurrentPaymentCollectionsCycle');

        $validator
            ->scalar('CreditCardHash')
            ->maxLength('CreditCardHash', 250)
            ->allowEmptyString('CreditCardHash');

        $validator
            ->scalar('OriginalEntryKeycode')
            ->maxLength('OriginalEntryKeycode', 20)
            ->allowEmptyString('OriginalEntryKeycode');

        $validator
            ->scalar('Vendor')
            ->maxLength('Vendor', 50)
            ->allowEmptyString('Vendor');

        $validator
            ->scalar('CallToAction')
            ->maxLength('CallToAction', 50)
            ->allowEmptyString('CallToAction');

        $validator
            ->scalar('CustomerIP')
            ->maxLength('CustomerIP', 20)
            ->allowEmptyString('CustomerIP');

        $validator
            ->scalar('AiringStation')
            ->maxLength('AiringStation', 50)
            ->allowEmptyString('AiringStation');

        $validator
            ->dateTime('AiringDate')
            ->allowEmptyDateTime('AiringDate');

        $validator
            ->dateTime('PaymentPlanBasisDate')
            ->allowEmptyDateTime('PaymentPlanBasisDate');

        $validator
            ->boolean('IsPaymentPlanOrder')
            ->requirePresence('IsPaymentPlanOrder', 'create')
            ->notEmptyString('IsPaymentPlanOrder');

        $validator
            ->boolean('PaymentIsTokenized')
            ->requirePresence('PaymentIsTokenized', 'create')
            ->notEmptyString('PaymentIsTokenized');

        $validator
            ->integer('LeadNumber')
            ->allowEmptyString('LeadNumber');

        $validator
            ->boolean('StorageExpired')
            ->allowEmptyString('StorageExpired');

        $validator
            ->decimal('TotalAmount')
            ->requirePresence('TotalAmount', 'create')
            ->notEmptyString('TotalAmount');

        $validator
            ->decimal('TotalPaid')
            ->requirePresence('TotalPaid', 'create')
            ->notEmptyString('TotalPaid');

        $validator
            ->decimal('TotalReturned')
            ->requirePresence('TotalReturned', 'create')
            ->notEmptyString('TotalReturned');

        $validator
            ->decimal('TotalRefunded')
            ->requirePresence('TotalRefunded', 'create')
            ->notEmptyString('TotalRefunded');

        $validator
            ->decimal('Tax')
            ->requirePresence('Tax', 'create')
            ->notEmptyString('Tax');

        $validator
            ->decimal('SH')
            ->requirePresence('SH', 'create')
            ->notEmptyString('SH');

        $validator
            ->decimal('SHTax')
            ->requirePresence('SHTax', 'create')
            ->notEmptyString('SHTax');

        $validator
            ->decimal('HeaderSHAmount')
            ->allowEmptyString('HeaderSHAmount');

        $validator
            ->decimal('OrderBalance')
            ->allowEmptyString('OrderBalance');

        $validator
            ->scalar('CreditCardBIN')
            ->maxLength('CreditCardBIN', 100)
            ->allowEmptyString('CreditCardBIN');

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
            ->integer('SHTaxRuleMatchType')
            ->allowEmptyString('SHTaxRuleMatchType');

        $validator
            ->dateTime('SHTaxCalculationDate')
            ->allowEmptyDateTime('SHTaxCalculationDate');

        $validator
            ->scalar('CreditCardLast4Digits')
            ->maxLength('CreditCardLast4Digits', 100)
            ->allowEmptyString('CreditCardLast4Digits');

        $validator
            ->integer('AutoRefundExpiry')
            ->allowEmptyString('AutoRefundExpiry');

        $validator
            ->integer('SaveInProgress')
            ->requirePresence('SaveInProgress', 'create')
            ->notEmptyString('SaveInProgress');

        $validator
            ->allowEmptyString('CreditCardId');

        $validator
            ->allowEmptyString('PayPalAccountId');

        $validator
            ->integer('ApplePayTokenId')
            ->allowEmptyString('ApplePayTokenId');

        $validator
            ->integer('CreditCardOriginId')
            ->allowEmptyString('CreditCardOriginId');

        $validator
            ->integer('OverridePaymentProcessingDivision')
            ->allowEmptyString('OverridePaymentProcessingDivision');

        $validator
            ->scalar('CreditCardCCV')
            ->maxLength('CreditCardCCV', 10)
            ->allowEmptyString('CreditCardCCV');

        $validator
            ->date('CreditCardCCVRemovalDate')
            ->allowEmptyDate('CreditCardCCVRemovalDate');

        return $validator;
    }
    
    public function getOrders() {
        $thisTable = $this->getThisTable();
        $orders = NULL;
        
        $thisTable->belongsTo('customer',[
            'foreignKey'=>'CustomerNumber',
            'bindingKey'=>'CustomerNumber',
            'joinType'=>'LEFT'
        ]);
        
        $thisTable->hasMany('orderline',[
            'foreignKey'=>'OrderNumber',
            'bindingKey'=>'OrderNumber',
            'joinType'=>'INNER'
        ])->conditions(['orderline.item_name IS NOT NULL']);
        
        $data = $thisTable->find()
                ->contain(['customer','orderline'])
                ->where(['orderheader.OrderNumber IN'=>['1044515']])
                ->offset(0)
                ->limit(10)
                ->all();
        $results = $data->toArray();
        
        if(count($results)>0){
            $orders = [];
        }
        foreach ($results as $orderRcords){
            $orderDetails = new \App\Dto\AddOrderData();
            $orderDetails->status_id = $orderRcords->BcOrderStatus;
            $orderDetails->customer_id = $orderRcords->customer->bcId;
            $orderDetails->staff_notes = "Order Number => ".$orderRcords->OrderNumber;
            $date = new \Cake\Chronos\Date($orderRcords->OrderDate);
            $orderDetails->date_created = $date->toRfc2822String();
            $addressDetails = new \App\Dto\AddressDetailsDto();
            $addressDetails->city = $orderRcords->customer->City;
            $addressDetails->company = "";
            $addressDetails->country = $orderRcords->customer->Country;
            $addressDetails->country_iso2 = $orderRcords->customer->TLD;
            $addressDetails->email = $orderRcords->customer->Email;
            $addressDetails->first_name = $orderRcords->customer->Firstname;
            $addressDetails->last_name = $orderRcords->customer->Lastname;
            $addressDetails->state = $orderRcords->customer->State;
            $addressDetails->street_1 = $orderRcords->customer->Addr1;
            $addressDetails->zip = $orderRcords->customer->ZIP;
            $addressDetails->phone = $orderRcords->customer->PhoneNumber;
            
            $orderDetails->billing_address = $addressDetails;
            $orderDetails->shipping_addresses = [$addressDetails];
            $products = [];
            foreach ($orderRcords->orderline as $orderInfo) {
                
                
                if($orderInfo->bc_product_id == NULL){
                    $productDetails = new \App\Dto\OrderProductDetailDto();
                    $productDetails->name = $orderInfo->item_name;
                    $productDetails->price_ex_tax = $orderInfo->Price;
                    $productDetails->price_inc_tax = $orderInfo->Price;
                    $productDetails->quantity = $orderInfo->Quantity;
                }else{
                    $productDetails = new \App\Dto\OrderProductOptionDetails();
                    $productDetails->price_ex_tax = $orderInfo->Price;
                    $productDetails->price_inc_tax = $orderInfo->Price;
                    $productDetails->quantity = $orderInfo->Quantity;
                    $productDetails->product_id = $orderInfo->bc_product_id;
                    $options = explode(',', $orderInfo->bc_option_id);
                    $orderOptions = [];
                    foreach ($options as $optionValue) {
                        $optionDetails = new \App\Dto\OrderOptionDetails();
                        $optionDetails->id = $optionValue;
                        $optionDetails->value = "100";
                        array_push($orderOptions, $optionDetails);
                    }
                    $productDetails->product_options = $orderOptions;
                    
                }
                $price = $orderInfo->Price;
                if($price >= 0 ){
                    array_push($products, $productDetails);
                }else{
                    $orderDetails->discount_amount = abs($price);
                }
            }
            $orderDetails->products = $products;
            if(count($products)>0){
                array_push($orders, $orderDetails);
            }
        }
//        $thisTable->saveMany($results);
        return $orders;
    }
}
