<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductOption Model
 *
 * @method \App\Model\Entity\ProductOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOption saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductOptionTable extends Table
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

        $this->setTable('product_option');
        $this->setDisplayField('OptionId');
        $this->setPrimaryKey('OptionId');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('product_option');
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
            ->integer('OptionId')
            ->allowEmptyString('OptionId', null, 'create');

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

        return $validator;
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
                    array_push($optionArr, $dbProductOption);
                }
            }
        }
        if($thisTable->saveMany($optionArr)){
            $added = TRUE;
        }
        return $added;
    }
}
