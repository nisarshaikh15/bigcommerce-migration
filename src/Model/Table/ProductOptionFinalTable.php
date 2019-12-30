<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductOptionFinal Model
 *
 * @method \App\Model\Entity\ProductOptionFinal get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductOptionFinal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductOptionFinal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionFinal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOptionFinal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOptionFinal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionFinal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOptionFinal findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductOptionFinalTable extends Table
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

        $this->setTable('product_option_final');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('product_option_final');
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
            ->scalar('ProductCode')
            ->maxLength('ProductCode', 13)
            ->allowEmptyString('ProductCode');

        $validator
            ->scalar('OgProductCode')
            ->maxLength('OgProductCode', 100)
            ->requirePresence('OgProductCode', 'create')
            ->notEmptyString('OgProductCode');

        $validator
            ->scalar('OptionNameRevised')
            ->maxLength('OptionNameRevised', 17)
            ->allowEmptyString('OptionNameRevised');

        $validator
            ->scalar('OptionsRevised')
            ->maxLength('OptionsRevised', 55)
            ->allowEmptyString('OptionsRevised');

        $validator
            ->scalar('ShortCode')
            ->maxLength('ShortCode', 5)
            ->allowEmptyString('ShortCode');

        $validator
            ->scalar('Notes')
            ->maxLength('Notes', 68)
            ->allowEmptyString('Notes');

        return $validator;
    }
    
    
    
    public function getOptionNames($productId) {
        $thisTable = $this->getThisTable();
        $optionNames = NULL;
        $data = $thisTable->find()
                ->where(['OgProductCode'=>$productId])
                ->select(['OptionNameRevised'])
                ->group('OptionNameRevised')
                ->all();
        
        $result = $data->toArray();
        if(count($result)>0){
            $optionNames = [];
        }
        foreach ($result as $optionRecords){
            array_push($optionNames, $optionRecords->OptionNameRevised);
        }
        return $optionNames;
        
    }
    
    
    public function getOption($optionName,$productId){
        $thisTable = $this->getThisTable();
        $optionInfo = NULL;
        $optionNames = NULL;
        $data = $thisTable->find()
                ->where(['OptionNameRevised'=>$optionName,'OgProductCode'=>$productId])
                ->select(['OptionValue'=>'OptionsRevised','ShortCode'])
                ->orderAsc('OptionsRevised')
                ->all();
        
        $result = $data->toArray();
        
        if(count($result)>0){
            $optionNames = [];
            $shortCodes = [];
        }
        foreach ($result as $optionRecords){
            array_push($optionNames, $optionRecords->OptionValue);
            array_push($shortCodes, $optionRecords->ShortCode);
            
        }
        if(count($optionNames)>0){
            $optionInfo = new \App\Dto\CsvOptionInfoDto();
            $optionInfo->optionName = $optionName;
            $optionInfo->optionValue = $optionNames;
            $optionInfo->shortCodes = $shortCodes;
        }
        
        return $optionInfo;
    }
    
    public function updateOption($optionName,$productId,$optionNameId,$optionId){
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $data = $thisTable->find()
                ->where(['OptionsRevised'=>$optionName,'OgProductCode'=>$productId])
                ->first();
        
        if($data){
            $data->OptionId = $optionNameId.",".$optionId;
            if($thisTable->save($data)){
                $added = TRUE;
            }
        }
        
        return $added;
    }
    
    
    public function getOptionDetails($optionName,$productId,$optionNumber){
        $thisTable = $this->getThisTable();
        $optionInfo = NULL;
        $optionNames = NULL;
        $data = $thisTable->find()
                ->where(['OptionName'=>$optionName,'OgProductCode'=>$productId,'OptionId IS NOT NULL'])
                ->orderAsc('Id')
                ->all();
        
        $result = $data->toArray();
        
        if(count($result)>0){
            $optionInfo = $result[$optionNumber - 1]->OptionId;
            //$optionInfo = $result[$optionNumber - 1];
        }
        
        
        return $optionInfo;
    }
}
