<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CentraliseProductVariant Model
 *
 * @method \App\Model\Entity\CentraliseProductVariant get($primaryKey, $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProductVariant findOrCreate($search, callable $callback = null, $options = [])
 */
class CentraliseProductVariantTable extends Table
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

        $this->setTable('centralise_product_variant');
        $this->setDisplayField('SN');
        $this->setPrimaryKey('SN');
    }
    
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('centralise_product_variant');
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
            ->integer('SN')
            ->allowEmptyString('SN', null, 'create');

        $validator
            ->scalar('ItemCode')
            ->maxLength('ItemCode', 100)
            ->allowEmptyString('ItemCode');

        $validator
            ->scalar('ParentItemCode')
            ->maxLength('ParentItemCode', 100)
            ->allowEmptyString('ParentItemCode');

        $validator
            ->scalar('ProductName')
            ->maxLength('ProductName', 200)
            ->allowEmptyString('ProductName');

        $validator
            ->scalar('SizeCode')
            ->maxLength('SizeCode', 45)
            ->allowEmptyString('SizeCode');

        $validator
            ->scalar('SizeDescription')
            ->maxLength('SizeDescription', 200)
            ->allowEmptyString('SizeDescription');

        $validator
            ->scalar('ColorCode')
            ->maxLength('ColorCode', 10)
            ->allowEmptyString('ColorCode');

        $validator
            ->scalar('ColorDescription')
            ->maxLength('ColorDescription', 200)
            ->allowEmptyString('ColorDescription');

        $validator
            ->scalar('StyleCode')
            ->maxLength('StyleCode', 45)
            ->allowEmptyString('StyleCode');

        $validator
            ->scalar('StyleDescription')
            ->maxLength('StyleDescription', 200)
            ->allowEmptyString('StyleDescription');

        $validator
            ->scalar('InfoText')
            ->maxLength('InfoText', 500)
            ->allowEmptyString('InfoText');

        $validator
            ->scalar('ItemId')
            ->maxLength('ItemId', 45)
            ->allowEmptyString('ItemId');

        $validator
            ->scalar('Path')
            ->maxLength('Path', 200)
            ->allowEmptyString('Path');

        $validator
            ->scalar('ProductStatus')
            ->maxLength('ProductStatus', 45)
            ->allowEmptyString('ProductStatus');

        $validator
            ->scalar('Sku')
            ->allowEmptyString('Sku');

        return $validator;
    }
    
    public function addVariationData($variationData) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $variations = [];
        foreach ($variationData as $variationInfo) {
            $vareationRecord = $this->newEntity();
            $vareationRecord->ColorCode = $variationInfo->colorCode;
            $vareationRecord->ColorDescription = $variationInfo->colorDescription;
            $vareationRecord->InfoText = $variationInfo->infoText;
            $vareationRecord->ItemCode = $variationInfo->itemCode;
            $vareationRecord->ItemId = $variationInfo->itemId;
            $vareationRecord->ParentItemCode = $variationInfo->parentItemCode;
            $vareationRecord->Path = $variationInfo->path;
            $vareationRecord->ProductName = $variationInfo->productName;
            $vareationRecord->ProductStatus = $variationInfo->productStatus;
            $vareationRecord->SizeCode = $variationInfo->sizeCode;
            $vareationRecord->SizeDescription = $variationInfo->sizeDescription;
            $vareationRecord->StyleCode = $variationInfo->styleCode;
            $vareationRecord->StyleDescription = $variationInfo->styleDescription;
            array_push($variations, $vareationRecord);
        }
        if(count($variations)>0){
            if($thisTable->saveMany($variations)){
                $added = TRUE;
            }
        }
        return $added;
    }
    
    public function createSku() {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        
        $dbCentraliseVariant = $thisTable->find()
                ->limit(500)
                ->all();
        
        $result = $dbCentraliseVariant->toArray();
        
        if(count($result)==0){
            return FALSE;
        }
        foreach ($result as $vareationRecord) {
            $name = $vareationRecord->ParentItemCode." ".$vareationRecord->ProductName." ";
            
            if($vareationRecord->SizeDescription != null){
                $name .= $vareationRecord->SizeDescription." ";
            }
            
            if($vareationRecord->StyleDescription != null){
                $name .= $vareationRecord->StyleDescription." ";
            }
            
            if($vareationRecord->ColorDescription != null){
                $name .= $vareationRecord->ColorDescription." ";
            }
            
            if($name != ""){
                $vareationRecord->Sku = trim($this->hyphenize($name), '-');
            }
            
        }
            if($thisTable->saveMany($result)){
                $added = TRUE;
            }
        
        return $added;
    }
    
    
    private function hyphenize($string) {
       $dict = array(
           "I'm" => "I am",
           "thier" => "their",
       );
       return strtolower(
               preg_replace(
                       array('#[\\s-]+#', '#[^A-Za-z0-9\. -]+#'), array('-', ''),
                       // the full cleanString() can be download from http://www.unexpectedit.com/php/php-clean-string-of-utf8-chars-convert-to-similar-ascii-char
                       $this->cleanString(
                               str_replace(// preg_replace to support more complicated replacements
                                       array_keys($dict), array_values($dict), urldecode($string)
                               )
                       )
               )
       );
   }
   private function cleanString($text) {
       $utf8 = array(
           '/[áàâãªä]/u' => 'a',
           '/[ÁÀÂÃÄ]/u' => 'A',
           '/[ÍÌÎÏ]/u' => 'I',
           '/[íìîï]/u' => 'i',
           '/[éèêë]/u' => 'e',
           '/[ÉÈÊË]/u' => 'E',
           '/[óòôõºö]/u' => 'o',
           '/[ÓÒÔÕÖ]/u' => 'O',
           '/[úùûü]/u' => 'u',
           '/[ÚÙÛÜ]/u' => 'U',
           '/ç/' => 'c',
           '/Ç/' => 'C',
           '/ñ/' => 'n',
           '/Ñ/' => 'N',
           '/–/' => '-', // UTF-8 hyphen to "normal" hyphen
           '/[’‘‹›‚]/u' => ' ', // Literally a single quote
           '/[“”«»„]/u' => ' ', // Double quote
           '/ /' => ' ', // nonbreaking space (equiv. to 0x160)
       );
       return preg_replace(array_keys($utf8), array_values($utf8), $text);
   }
}
