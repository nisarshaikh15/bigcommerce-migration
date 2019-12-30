<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductOptionNew Model
 *
 * @method \App\Model\Entity\ProductOptionNew get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductOptionNew newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductOptionNew[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionNew|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOptionNew saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOptionNew patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionNew[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionNew findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductOptionNewTable extends Table
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

        $this->setTable('product_option_new');
        $this->setPrimaryKey('Id');
    }
    
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('product_option_new');
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
            ->requirePresence('Id', 'create')
            ->notEmptyString('Id')
            ->add('Id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('ProductCode')
            ->maxLength('ProductCode', 45)
            ->allowEmptyString('ProductCode');

        $validator
            ->scalar('OptionName')
            ->maxLength('OptionName', 300)
            ->allowEmptyString('OptionName');

        $validator
            ->scalar('Options')
            ->maxLength('Options', 500)
            ->allowEmptyString('Options');

        $validator
            ->scalar('ItemId')
            ->maxLength('ItemId', 50)
            ->allowEmptyString('ItemId');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 500)
            ->allowEmptyString('Name');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->isUnique(['Id']));

        return $rules;
    }
    
    public function addOptions($optionData) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $optionArr = [];
        foreach ($optionData as $optionRecord) {
            foreach ($optionRecord->option as $optionInfo){
                foreach ($optionInfo->optionValues as $options){
                    $dbProductOption = $this->newEntity();
                    $dbProductOption->ProductCode = $optionRecord->code;
                    $dbProductOption->OptionName = $optionInfo->optionName;
                    $dbProductOption->Options = $options;
                    $dbProductOption->ItemId = $optionRecord->itemId;
                    $dbProductOption->Name = $optionRecord->name;
                    $dbProductOption->status = 1;
                    array_push($optionArr, $dbProductOption);
                }
            }
        }
        if($thisTable->saveMany($optionArr)){
            $added = TRUE;
        }
        return $added;
    }
    
    public function addCopyOptions($optionData) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $optionArr = [];
        foreach ($optionData as $optionRecord) {
            $dbProductOption = $this->newEntity();
            $dbProductOption->ProductCode = $optionRecord->code;
            $dbProductOption->OptionName = $optionRecord->name;
            $dbProductOption->Options = $optionRecord->option;
            $dbProductOption->status = 1;
            array_push($optionArr, $dbProductOption);
            
        }
        if($thisTable->saveMany($optionArr)){
            $added = TRUE;
        }
        return $added;
    }
    
    public function getOptionNames($productId) {
        $thisTable = $this->getThisTable();
        $optionNames = NULL;
        $data = $thisTable->find()
                ->where(['ProductCode'=>$productId])
                ->select(['OptionName'])
                ->group('OptionName')
                ->all();
        
        $result = $data->toArray();
        if(count($result)>0){
            $optionNames = [];
        }
        foreach ($result as $optionRecords){
            array_push($optionNames, $optionRecords->OptionName);
        }
        return $optionNames;
        
    }
    
    
    public function getOption($optionName,$productId){
        $thisTable = $this->getThisTable();
        $optionInfo = NULL;
        $optionNames = NULL;
        $data = $thisTable->find()
                ->where(['OptionName'=>$optionName,'ProductCode'=>$productId,'Options != ""'])
                ->select(['OptionValue'=>'Options'])
                ->orderAsc('Options')
                ->all();
        
        $result = $data->toArray();
        
        if(count($result)>0){
            $optionNames = [];
            
        }
        foreach ($result as $optionRecords){
            array_push($optionNames, $optionRecords->OptionValue);
        }
        if(count($optionNames)>0){
            $optionInfo = new \App\Dto\CsvOptionInfoDto();
            $optionInfo->optionName = $optionName;
            $optionInfo->optionValue = $optionNames;
        }
        
        return $optionInfo;
    }
}
