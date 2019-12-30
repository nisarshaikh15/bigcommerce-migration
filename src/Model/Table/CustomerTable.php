<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customer Model
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerTable extends Table
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

        $this->setTable('customer');
        $this->setDisplayField('CID');
        $this->setPrimaryKey(['CID', 'CustomerNumber']);
    }

    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('customer');
    }
    
    
    public function getCustomers() {
        $thisTable = $this->getThisTable();
        $customerInfo = NULL;
        
        $thisTable->hasMany('customeraddress',[
            'foreignKey'=>'CustomerNumber',
            'bindingKey'=>'CustomerNumber',
            'joinType'=>'Left'
        ]);
        
        $data = $thisTable->find()
                ->contain(['customeraddress'])
                ->where(['bcId IS NULL'])
//                ->offset(0)
                ->limit(100)
                ->all();
        
        $result = $data->toArray();
        if(count($result)>0){
            $customerInfo = [];
        }
        
        foreach ($result as $customerRecord) {
            $customers = [];
            $bigcommerceCutInfo = new \App\Dto\BigcommerceCustomerInfo();
            $bigcommerceCutInfo->first_name = $customerRecord->Firstname;
            $bigcommerceCutInfo->last_name = $customerRecord->Lastname;
            $bigcommerceCutInfo->company = $customerRecord->Company;
            $bigcommerceCutInfo->phone = $customerRecord->PhoneNumber;
            $bigcommerceCutInfo->email = $customerRecord->Email;
            $bigcommerceCutInfo->notes = "";
            $address = [];
            foreach ($customerRecord->customeraddress as $addressInfo) {
                $bigcommerceAddrInfo = new \App\Dto\CustomerAddressDto();
                $bigcommerceAddrInfo->first_name = $addressInfo->Firstname;
                $bigcommerceAddrInfo->last_name = $addressInfo->Lastname;
                $bigcommerceAddrInfo->address1 = $addressInfo->Addr1;
                $bigcommerceAddrInfo->phone = $addressInfo->PhoneNumber;
                $bigcommerceAddrInfo->address2 = $addressInfo->Addr2;
                $bigcommerceAddrInfo->city = $addressInfo->City;
                $bigcommerceAddrInfo->state_or_province = $addressInfo->State;
                $bigcommerceAddrInfo->postal_code = $addressInfo->ZIP;
                $bigcommerceAddrInfo->country_code = $addressInfo->TLD;
                $bigcommerceAddrInfo->address_type = "residential";
                array_push($address, $bigcommerceAddrInfo);
            }
            $bigcommerceCutInfo->addresses = $address;
            $bigcommerceCutInfo->authentication = new \App\Dto\AuthenticationDto();
            
            array_push($customers, $bigcommerceCutInfo);
            array_push($customerInfo, $customers);
        }
        return $customerInfo;
    }
    
    public function updateCustomers($email,$bcId) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        
        
        $data = $thisTable->find()
                ->where(['Email'=>$email])
                ->first();
        
        
        if($data){
            $data->bcId = $bcId;
            if($thisTable->save($data)){
                $added = TRUE;
            }
        }
        
        return $added;
    }
}
