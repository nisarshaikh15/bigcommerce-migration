<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YahooProductCatalog Model
 *
 * @method \App\Model\Entity\YahooProductCatalog get($primaryKey, $options = [])
 * @method \App\Model\Entity\YahooProductCatalog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YahooProductCatalog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YahooProductCatalog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YahooProductCatalog findOrCreate($search, callable $callback = null, $options = [])
 */
class YahooProductCatalogTable extends Table
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

        $this->setTable('yahoo_product_catalog');
        $this->setDisplayField('name');
        $this->setPrimaryKey('auto_increment_id');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('yahoo_product_catalog');
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
            ->allowEmptyString('auto_increment_id', null, 'create');

        $validator
            ->scalar('path')
            ->maxLength('path', 292)
            ->allowEmptyString('path');

        $validator
            ->scalar('id')
            ->maxLength('id', 100)
            ->allowEmptyString('id');

        $validator
            ->scalar('ItemCode')
            ->maxLength('ItemCode', 74)
            ->allowEmptyString('ItemCode');

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

        return $validator;
    }
    
    public function getProducts() {
        $thisTable = $this->getThisTable();
        $products = NULL;
        
//        $thisTable->belongsTo('item',[
//            'foreignKey'=>'ItemCode',
//            'bindingKey'=>'ItemCode',
//            'joinType'=>'LEFT'
//        ]);
        
        $data = $thisTable->find()
//                ->contain(['item'])
                ->where(['Added'=> 1])
                ->offset(0)
                ->limit(5)
                ->all();
        $results = $data->toArray();
        
        if(count($results)>0){
            $products = [];
        }
        
        foreach ($results as $productRcords){
            $productDetails = new \App\Dto\ProductDetailsDto();
            $productDetails->Id = $productRcords->id;
//            $productDetails->ItemId = $productRcords->item->ItemId;
            $productDetails->Name = $productRcords->name;
            $productDetails->Code = $productRcords->ItemCode;
            $productDetails->Price = $productRcords->price;
            $productDetails->SalePrice = $productRcords->sale_price;
            $productDetails->Orderable = $productRcords->orderable;
            $productDetails->Options = $productRcords->options;
            $productDetails->Headline = $productRcords->headline;
            $productDetails->Caption = $productRcords->caption;
            $productDetails->Leaf = $productRcords->leaf;
            $productDetails->GiftCertificate = $productRcords->gift_certificate;
            $productDetails->NeedShip = $productRcords->need_ship;
            $productDetails->Ypath = $productRcords->ypath;
            $productDetails->ProductUrl = $productRcords->product_url;
            $productDetails->SubsectionHtml = $productRcords->subsection_html;
            $productDetails->CrossSell = $productRcords->cross_sell;
            $productDetails->ScEnlargeTitles = $productRcords->sc_enlarge_titles;
            $productDetails->Insert1 = $productRcords->insert1;
            $productDetails->Insert2 = $productRcords->insert2;
            $productDetails->Tab1Title = $productRcords->tab_1_title;
            $productDetails->Tab1Text = $productRcords->tab_1_text;
            $productDetails->Tab2Title = $productRcords->tab_2_title;
            $productDetails->Tab2Text = $productRcords->tab_2_text;
            $productDetails->Tab3Title = $productRcords->tab_3_title;
            $productDetails->Tab3Text = $productRcords->tab_3_text;
            $productRcords->Added = 0;
            array_push($products, $productDetails);
        }
        
        $thisTable->saveMany($results);
        return $products;
    }
    
    
    public function getCategory() {
        $thisTable = $this->getThisTable();
        $category = NULL;
        
        $data = $thisTable->find()
                ->where(['path NOT LIKE'=> '%:%'])
                ->distinct(['path'])
                ->select(['path'])
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $category = [];
        }
        
        foreach ($results as $productRcords){
            array_push($category, $productRcords->path);
        }
        
        return $category;
    }
    
    public function getSubCategory($category) {
        $thisTable = $this->getThisTable();
        $category = NULL;
        
        $data = $thisTable->find()
                ->where(['path LIKE'=> '%'.trim($category).'%'])
                ->distinct(['path'])
                ->select(['path'])
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $category = [];
        }
        
        foreach ($results as $productRcords){
            
            array_push($category, $productRcords->path);
        }
        
        return $category;
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
                ->where(['yahoo_product_catalog.Added '=>1,'yahoo_product_catalog.code IN'=>['R1002T3','E1045C1','P2005','E1000R125CL','COGSDP25',]])
                ->select(['ProductId'=>'yahoo_product_catalog.code',
                    'Name'=>'yahoo_product_catalog.name',
                    'Description'=>'product_catalog_images.description',
                    'Price'=>'yahoo_product_catalog.price',
                    'Images'=>'product_catalog_images.image_link',
                    'AdditionImages'=>'product_catalog_images.additional_image_link',
                    'CategoryId'=>'category_copy.bc_cat_id'])
//                ->offset(0)
//                ->limit(1)
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
        
        $data = $thisTable->find()
                ->where(['code'=> $productId])
                ->select(['bc_product_id','bc_option_id'])
                ->first();
        
        
        if($data){
            $optionInfo = new \App\Dto\ProductOptionInfoDto();
            $optionInfo->productId = $data->bc_product_id;
            if($data->bc_option_id != NULL && $data->bc_option_id != ""){
                $optionInfo->optionId = explode(',', $data->bc_option_id);
            }
            
        }
        
        return $optionInfo;
    }
}
