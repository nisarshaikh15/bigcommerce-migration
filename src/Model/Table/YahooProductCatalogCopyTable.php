<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YahooProductCatalogCopy Model
 *
 * @property \App\Model\Table\BcProductsTable&\Cake\ORM\Association\BelongsTo $BcProducts
 * @property \App\Model\Table\BcOptionsTable&\Cake\ORM\Association\BelongsTo $BcOptions
 *
 * @method \App\Model\Entity\YahooProductCatalogCopy get($primaryKey, $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalogCopy findOrCreate($search, callable $callback = null, $options = [])
 */
class YahooProductCatalogCopyTable extends Table
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

        $this->setTable('yahoo_product_catalog_copy');
        $this->setDisplayField('name');
        $this->setPrimaryKey('auto_increment_id');

//        $this->belongsTo('BcProducts', [
//            'foreignKey' => 'bc_product_id'
//        ]);
//        $this->belongsTo('BcOptions', [
//            'foreignKey' => 'bc_option_id'
//        ]);
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('yahoo_product_catalog_copy');
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
            ->integer('auto_increment_id')
            ->allowEmptyString('auto_increment_id', null, 'create')
            ->add('auto_increment_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('path')
            ->maxLength('path', 292)
            ->allowEmptyString('path');

        $validator
            ->scalar('id')
            ->maxLength('id', 100)
            ->allowEmptyString('id');

        $validator
            ->scalar('code')
            ->maxLength('code', 74)
            ->allowEmptyString('code');

        $validator
            ->scalar('caption')
            ->allowEmptyString('caption');

        $validator
            ->scalar('ship_weight')
            ->maxLength('ship_weight', 10)
            ->allowEmptyString('ship_weight');

        $validator
            ->scalar('sc_enlarge_titles')
            ->maxLength('sc_enlarge_titles', 10)
            ->allowEmptyString('sc_enlarge_titles');

        $validator
            ->scalar('abstract')
            ->maxLength('abstract', 133)
            ->allowEmptyString('abstract');

        $validator
            ->scalar('cross_sell')
            ->maxLength('cross_sell', 365)
            ->allowEmptyString('cross_sell');

        $validator
            ->scalar('product_url')
            ->maxLength('product_url', 113)
            ->allowEmptyString('product_url');

        $validator
            ->scalar('tab_2_text')
            ->maxLength('tab_2_text', 223)
            ->allowEmptyString('tab_2_text');

        $validator
            ->scalar('sale_price')
            ->maxLength('sale_price', 4)
            ->allowEmptyString('sale_price');

        $validator
            ->scalar('tab_1_text')
            ->allowEmptyString('tab_1_text');

        $validator
            ->scalar('tab_1_title')
            ->maxLength('tab_1_title', 28)
            ->allowEmptyString('tab_1_title');

        $validator
            ->scalar('orderable')
            ->maxLength('orderable', 14)
            ->allowEmptyString('orderable');

        $validator
            ->scalar('label')
            ->maxLength('label', 3)
            ->allowEmptyString('label');

        $validator
            ->scalar('need_ship')
            ->maxLength('need_ship', 3)
            ->allowEmptyString('need_ship');

        $validator
            ->scalar('ypath')
            ->maxLength('ypath', 12)
            ->allowEmptyString('ypath');

        $validator
            ->scalar('options')
            ->maxLength('options', 558)
            ->allowEmptyString('options');

        $validator
            ->scalar('tab_3_title')
            ->maxLength('tab_3_title', 253)
            ->allowEmptyString('tab_3_title');

        $validator
            ->scalar('subsection_html')
            ->maxLength('subsection_html', 93)
            ->allowEmptyString('subsection_html');

        $validator
            ->scalar('taxable')
            ->maxLength('taxable', 3)
            ->allowEmptyString('taxable');

        $validator
            ->scalar('headline')
            ->maxLength('headline', 126)
            ->allowEmptyString('headline');

        $validator
            ->scalar('video')
            ->maxLength('video', 73)
            ->allowEmptyString('video');

        $validator
            ->scalar('condition')
            ->maxLength('condition', 3)
            ->allowEmptyString('condition');

        $validator
            ->scalar('family')
            ->maxLength('family', 3)
            ->allowEmptyString('family');

        $validator
            ->scalar('sale_price_override')
            ->maxLength('sale_price_override', 16)
            ->allowEmptyString('sale_price_override');

        $validator
            ->scalar('alternate_subsection')
            ->maxLength('alternate_subsection', 3)
            ->allowEmptyString('alternate_subsection');

        $validator
            ->scalar('tab_2_title')
            ->maxLength('tab_2_title', 29)
            ->allowEmptyString('tab_2_title');

        $validator
            ->scalar('gift_certificate')
            ->maxLength('gift_certificate', 12)
            ->allowEmptyString('gift_certificate');

        $validator
            ->scalar('price')
            ->maxLength('price', 6)
            ->allowEmptyString('price');

        $validator
            ->scalar('tab_3_text')
            ->maxLength('tab_3_text', 465)
            ->allowEmptyString('tab_3_text');

        $validator
            ->scalar('regular_price_override')
            ->maxLength('regular_price_override', 1)
            ->allowEmptyString('regular_price_override');

        $validator
            ->scalar('name')
            ->maxLength('name', 126)
            ->allowEmptyString('name');

        $validator
            ->integer('Added')
            ->allowEmptyString('Added');

        $validator
            ->integer('cid')
            ->allowEmptyString('cid');

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
        $rules->add($rules->isUnique(['auto_increment_id']));
//        $rules->add($rules->existsIn(['bc_product_id'], 'BcProducts'));
//        $rules->add($rules->existsIn(['bc_option_id'], 'BcOptions'));

        return $rules;
    }
    
    public function addProducts($productDetails) {
        $thisTable = $this->getThisTable();
        $productData = [];
        $added = FALSE;
        
        foreach ($productDetails as $productDetail) {
            $dbProduct = $this->newEntity();
            $dbProduct->name = $productDetail->name;
            $dbProduct->cid = $productDetail->cid;
            $dbProduct->code = $productDetail->code;
            $dbProduct->price = $productDetail->price;
            array_push($productData, $dbProduct);
        }
        
        if($thisTable->saveMany($productData)){
            $added = TRUE;
        }
        
        return $added;
    }
    
    
    public function getCSVProducts() {
        $thisTable = $this->getThisTable();
        $products = NULL;
        
        
        $thisTable->belongsTo('product_catalog_images',[
            'foreignKey'=>'code',
            'bindingKey'=>'id',
            'joinType'=>'LEFT'
        ]);
        
        $thisTable->belongsTo('category_copy',[
            'foreignKey'=>'cid',
            'bindingKey'=>'cid',
            'joinType'=>'INNER'
        ]);
        
        $data = $thisTable->find()
                ->contain(['product_catalog_images','category_copy'])
                ->where(['yahoo_product_catalog_copy.code IN '=>['S1001A15','S1001C15','S1001P15'],'category_copy.bc_cat_id IS NOT NULL'])
                ->select(['ProductId'=>'yahoo_product_catalog_copy.code',
                    'Name'=>'yahoo_product_catalog_copy.name',
                    'Description'=>'product_catalog_images.description',
                    'Price'=>'yahoo_product_catalog_copy.price',
                    'Images'=>'product_catalog_images.image_link',
                    'AdditionImages'=>'product_catalog_images.additional_image_link',
                    'CategoryId'=>'category_copy.bc_cat_id'])
                ->offset(1)
                ->limit(20)
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $products = [];
        }
        
        foreach ($results as $productRcords){
            $productDetails = new \App\Dto\CreateCsvProductDto();
            $productDetails->productId = $productRcords->ProductId;
            $productDetails->name = $productRcords->Name;
            $productDetails->description = $productRcords->Description;
            $productDetails->price = $productRcords->Price;
            $productDetails->images = $productRcords->Images;
            $productDetails->additionalImages = $productRcords->AdditionImages;
            $productDetails->categoryId = $productRcords->CategoryId;
            array_push($products, $productDetails);
        }
        
        return $products;
    }
    
    public function addProductId($productId,$bcProductId,$optionId) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        
        $data = $thisTable->find()
                ->where(['code'=> $productId])
                ->select(['auto_increment_id','bc_product_id','bc_option_id'])
                ->first();
        
        
        if($data){
            $data->bc_product_id = $bcProductId;
            $data->bc_option_id = $optionId;
            if($thisTable->save($data)){
                $added = TRUE;
            }
        }
        
        return $added;
    }
    
    public function getProductOption() {
        $thisTable = $this->getThisTable();
        $optionInfo = NULL;
        
        $productRcords = $thisTable->find()
                //->where(['bc_option_id != null','bc_option_id != ""'])
                ->select(['bc_product_id','bc_option_id'])
                ->all();
        
        $results = $productRcords->toArray();
        
        if(count($results)>0){
            $optionInfo = [];
        }
        
        foreach ($results as $data){
            $optionData = new \App\Dto\ProductOptionInfoDto();
            $optionData->productId = $data->bc_product_id;
            if($data->bc_option_id != NULL && $data->bc_option_id != ""){
                $optionData->optionId = explode(',', $data->bc_option_id);
                array_push($optionInfo, $optionData);
            }
            
        }
        
        return $optionInfo;
    }
    
}
