<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CentralizedOrder Model
 *
 * @method \App\Model\Entity\CentralizedOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\CentralizedOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CentralizedOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CentralizedOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentralizedOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentralizedOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CentralizedOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CentralizedOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class CentralizedOrderTable extends Table
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

        $this->setTable('centralized_order');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('centralized_order');
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
            ->integer('Id')
            ->allowEmptyString('Id', null, 'create');

        $validator
            ->integer('OrderNumber')
            ->allowEmptyString('OrderNumber');

        $validator
            ->scalar('OrderId')
            ->maxLength('OrderId', 45)
            ->allowEmptyString('OrderId');

        $validator
            ->scalar('CustomerNumber')
            ->maxLength('CustomerNumber', 45)
            ->allowEmptyString('CustomerNumber');

        $validator
            ->scalar('OrderStatus')
            ->maxLength('OrderStatus', 45)
            ->allowEmptyString('OrderStatus');

        $validator
            ->scalar('CreditCardType')
            ->maxLength('CreditCardType', 45)
            ->allowEmptyString('CreditCardType');

        $validator
            ->numeric('TotalAmount')
            ->allowEmptyString('TotalAmount');

        $validator
            ->numeric('OrderBalance')
            ->allowEmptyString('OrderBalance');

        $validator
            ->dateTime('KeyedDate')
            ->allowEmptyDateTime('KeyedDate');

        $validator
            ->dateTime('OrderDate')
            ->allowEmptyDateTime('OrderDate');

        $validator
            ->scalar('Keycode')
            ->maxLength('Keycode', 45)
            ->allowEmptyString('Keycode');

        $validator
            ->scalar('FirstName')
            ->maxLength('FirstName', 45)
            ->allowEmptyString('FirstName');

        $validator
            ->scalar('LastName')
            ->maxLength('LastName', 45)
            ->allowEmptyString('LastName');

        $validator
            ->scalar('Addr1')
            ->allowEmptyString('Addr1');

        $validator
            ->scalar('Addr2')
            ->allowEmptyString('Addr2');

        $validator
            ->scalar('Zip')
            ->maxLength('Zip', 45)
            ->allowEmptyString('Zip');

        $validator
            ->scalar('City')
            ->maxLength('City', 20)
            ->allowEmptyString('City');

        $validator
            ->scalar('State')
            ->maxLength('State', 45)
            ->allowEmptyString('State');

        $validator
            ->scalar('TLD')
            ->maxLength('TLD', 45)
            ->allowEmptyString('TLD');

        $validator
            ->scalar('PhoneNumber')
            ->maxLength('PhoneNumber', 45)
            ->allowEmptyString('PhoneNumber');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 45)
            ->allowEmptyString('Email');

        $validator
            ->scalar('PaymentType')
            ->maxLength('PaymentType', 45)
            ->allowEmptyString('PaymentType');

        $validator
            ->scalar('CreditCardAVSResult')
            ->maxLength('CreditCardAVSResult', 45)
            ->allowEmptyString('CreditCardAVSResult');

        $validator
            ->scalar('CreditCardCCVResult')
            ->maxLength('CreditCardCCVResult', 45)
            ->allowEmptyString('CreditCardCCVResult');

        $validator
            ->numeric('TotalPaid')
            ->allowEmptyString('TotalPaid');

        $validator
            ->numeric('TotalReturned')
            ->allowEmptyString('TotalReturned');

        $validator
            ->numeric('TotalRefunded')
            ->allowEmptyString('TotalRefunded');

        $validator
            ->numeric('Balance')
            ->allowEmptyString('Balance');

        return $validator;
    }
    
    /**
     * to add order data in centralise table
     * @param \App\Dto\OrderData $orderData
     */
    public function addOrders($orderData) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $orders = [];
        foreach ($orderData as $orderDetails) {
            $dbOrder = $this->newEntity();
            $dbOrder->Addr1 = $orderDetails->addr1;
            $dbOrder->Addr2 = $orderDetails->addr2;
            $dbOrder->Balance = $orderDetails->balance;
            $dbOrder->City = $orderDetails->city;
            $dbOrder->CreditCardAVSResult = $orderDetails->creditCardAVSResult ;
            $dbOrder->CreditCardCCVResult = $orderDetails->creditCardCCVResult;
            $dbOrder->CreditCardType = $orderDetails->creditCardType;
            $dbOrder->CustomerNumber = $orderDetails->customerNumber;
            $dbOrder->Email = $orderDetails->email;
            $dbOrder->FirstName = $orderDetails->firstName;
            $dbOrder->Keycode = $orderDetails->keycode;
            $dbOrder->KeyedDate = $orderDetails->keyedDate ;
            $dbOrder->LastName = $orderDetails->lastName;
            $dbOrder->OrderBalance = $orderDetails->orderBalance;
            $dbOrder->OrderDate = $orderDetails->orderDate;
            $dbOrder->OrderId = $orderDetails->orderId;
            $dbOrder->OrderNumber = $orderDetails->orderNumber;
            $dbOrder->OrderStatus = $orderDetails->orderStatus;
            $dbOrder->PaymentType = $orderDetails->paymentType;
            $dbOrder->State = $orderDetails->state;
            $dbOrder->TLD = $orderDetails->tld;
            $dbOrder->TotalAmount = $orderDetails->totalAmount;
            $dbOrder->TotalPaid = $orderDetails->totalPaid;
            $dbOrder->TotalRefunded = $orderDetails->totalRefunded;
            $dbOrder->TotalReturned = $orderDetails->totalReturned;
            $dbOrder->Zip = $orderDetails->zip;
            $dbOrder->PhoneNumber = $orderDetails->phoneNumber;
            array_push($orders, $dbOrder);
        }
        if(count($orders)>0){
            if($thisTable->saveMany($orders)){
                $added = TRUE;
            }
        }
        return $added;
    }
}
