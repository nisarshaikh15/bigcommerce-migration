<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Category Model
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryTable extends Table
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

        $this->setTable('category');
        $this->setDisplayField('cid');
        $this->setPrimaryKey('cid');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('category');
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
            ->integer('CategoryId')
            ->allowEmptyString('CategoryId', null, 'create');

        $validator
            ->scalar('Category')
            ->maxLength('Category', 500)
            ->allowEmptyString('Category');

        $validator
            ->integer('ParentId')
            ->allowEmptyString('ParentId');

        $validator
            ->integer('Level')
            ->allowEmptyString('Level');

        $validator
            ->scalar('Path')
            ->maxLength('Path', 5000)
            ->allowEmptyString('Path');

        return $validator;
    }
    
    
            
            
            
    public function addSubCategory($categoryList,$categoryId,$level) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $categoryArr = [];
        foreach ($categoryList as $category) {
            $pathArr = explode(':', $category);
            $path = trim($pathArr[$level+1]);
            if($path != null && $path != "" &&  $path != " "){
                $dbCategory = $this->newEntity();
                $dbCategory->Category = $path;
                $dbCategory->Level = $level+1;
                $dbCategory->Path = $category;
                $dbCategory->ParentId = $categoryId;
                if(!in_array($dbCategory, $categoryArr)){
                    array_push($categoryArr, $dbCategory);
                }
            }
        }
        if(count($categoryArr)>0){
            if($thisTable->saveMany($categoryArr)){
                $added = TRUE;
            }
        }
        return $added;
    }
    
    public function addCategory($categoryList) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $categoryArr = [];
        foreach ($categoryList as $category) {
            if($category != null && $category != "" && $category != " "){
                $dbCategory = $this->newEntity();
                $dbCategory->Category = $category;
                $dbCategory->Level = 0;
                $dbCategory->Path = $category;
                array_push($categoryArr, $dbCategory);
            }
        }
        if(count($categoryArr)>0){
            if($thisTable->saveMany($categoryArr)){
                $added = TRUE;
            }
        }
        return $added;
    }
    
    public function getCategory($parentId) {
        $thisTable = $this->getThisTable();
        $category = NULL;
        
        $data = $thisTable->find()
                ->where(['parent_id'=> $parentId,'consolidate'=>0])
                ->select(['name','cid','bc_cat_id'])
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $category = [];
        }
        
        foreach ($results as $productRcords){
            $categoryInfo = new \App\Dto\SubCategoryInfo();
            $categoryInfo->category = $productRcords->name;
            $categoryInfo->categoryId = $productRcords->cid;
            $categoryInfo->parentId = $productRcords->bc_cat_id;
            
            array_push($category, $categoryInfo);
        }
        
        return $category;
    }
    
    
    public function addBcCategory($bcCategoryId,$categoryId) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $data = $thisTable->find()
                ->where(['cid'=> $categoryId])
                ->select(['cid','bc_cat_id'])
                ->first();
        
        $data->bc_cat_id = $bcCategoryId;
        
        if($thisTable->save($data)){
            $added = TRUE;
        }
        
        return $added;
    }
    
    public function getCategoryProduct() {
        $thisTable = $this->getThisTable();
        $products = NULL;
        
        $thisTable->hasMany('yahoo_product_catalog', [
                'foreignKey'=>'cid',
                'bindingKey'=>'cid',
                'joinType'=>'INNER'   
                ]);
        $data = $thisTable->find()
                ->contain(['yahoo_product_catalog'])
                ->where(['category.consolidate'=> '1','cid IN'=>[352,330,336]])
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $products = [];
        }
        
        foreach ($results as $productRcords){
            $prices = [];
            $options = [];
            $productInfo = new \App\Dto\ProductCopyDto();
            $productInfo->name = $productRcords->name;
            $productInfo->cid = $productRcords->parent_id;
            $productInfo->code = $productRcords->yahoo_product_catalog[0]->code;
            foreach ($productRcords->yahoo_product_catalog as $productDetails){
                array_push($prices, $productDetails->price);
            }
            $price = sort($prices);
           
            $productInfo->price = $prices[0];
            
            foreach ($productRcords->yahoo_product_catalog as $productDetail){
                $addtionalPrice = $this->getPrice($productDetail->price,$prices[0]);
                $name = explode(" ", $productDetail->name);
                $optionInfo = new \App\Dto\OptionsDto();
                $optionInfo->code = $productRcords->yahoo_product_catalog[0]->code;
                $optionInfo->name = "Carat";
                $optionInfo->option = $name[0]."(+$".$addtionalPrice.")";
                array_push($options, $optionInfo);
            }
            $productInfo->options = $options;
            array_push($products, $productInfo);
            
        }
        
        return $products;
    }
    
    private function getPrice($extraPrice,$productPrice) {
        return (intval($extraPrice))- (intval($productPrice)) ;
    }
}
