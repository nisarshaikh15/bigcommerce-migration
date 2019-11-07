<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductCatalogImages Model
 *
 * @property \App\Model\Table\ItemGroupsTable&\Cake\ORM\Association\BelongsTo $ItemGroups
 * @property \App\Model\Table\PromotionsTable&\Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\ProductCatalogImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductCatalogImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductCatalogImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductCatalogImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductCatalogImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductCatalogImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCatalogImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductCatalogImage findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductCatalogImagesTable extends Table
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

        $this->setTable('product_catalog_images');
        $this->setDisplayField('title');
        $this->setPrimaryKey('SN');

        $this->belongsTo('ItemGroups', [
            'foreignKey' => 'item_group_id'
        ]);
        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id'
        ]);
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('product_catalog_images');
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
            ->nonNegativeInteger('SN')
            ->allowEmptyString('SN', null, 'create');

        $validator
            ->scalar('id')
            ->maxLength('id', 18)
            ->allowEmptyString('id');

        $validator
            ->scalar('title')
            ->maxLength('title', 126)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 2090)
            ->allowEmptyString('description');

        $validator
            ->scalar('link')
            ->maxLength('link', 170)
            ->allowEmptyString('link');

        $validator
            ->scalar('image_link')
            ->maxLength('image_link', 137)
            ->allowEmptyFile('image_link');

        $validator
            ->scalar('mobile_link')
            ->maxLength('mobile_link', 10)
            ->allowEmptyString('mobile_link');

        $validator
            ->scalar('additional_image_link')
            ->maxLength('additional_image_link', 934)
            ->allowEmptyFile('additional_image_link');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 8)
            ->allowEmptyString('availability');

        $validator
            ->scalar('availability_date')
            ->maxLength('availability_date', 10)
            ->allowEmptyString('availability_date');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('sale_price')
            ->maxLength('sale_price', 10)
            ->allowEmptyString('sale_price');

        $validator
            ->scalar('sale_price_effective_date')
            ->maxLength('sale_price_effective_date', 10)
            ->allowEmptyString('sale_price_effective_date');

        $validator
            ->scalar('unit_pricing_measure')
            ->maxLength('unit_pricing_measure', 10)
            ->allowEmptyString('unit_pricing_measure');

        $validator
            ->scalar('unit_pricing_base_measure')
            ->maxLength('unit_pricing_base_measure', 10)
            ->allowEmptyString('unit_pricing_base_measure');

        $validator
            ->scalar('google_product_category')
            ->maxLength('google_product_category', 31)
            ->allowEmptyString('google_product_category');

        $validator
            ->scalar('product_type')
            ->maxLength('product_type', 251)
            ->allowEmptyString('product_type');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 7)
            ->allowEmptyString('brand');

        $validator
            ->scalar('gtin')
            ->maxLength('gtin', 10)
            ->allowEmptyString('gtin');

        $validator
            ->scalar('mpn')
            ->maxLength('mpn', 18)
            ->allowEmptyString('mpn');

        $validator
            ->scalar('identifier_exists')
            ->maxLength('identifier_exists', 10)
            ->allowEmptyString('identifier_exists');

        $validator
            ->scalar('condition')
            ->maxLength('condition', 3)
            ->allowEmptyString('condition');

        $validator
            ->scalar('adult')
            ->maxLength('adult', 10)
            ->allowEmptyString('adult');

        $validator
            ->scalar('multipack')
            ->maxLength('multipack', 10)
            ->allowEmptyString('multipack');

        $validator
            ->scalar('is_bundle')
            ->maxLength('is_bundle', 10)
            ->allowEmptyString('is_bundle');

        $validator
            ->scalar('age_group')
            ->maxLength('age_group', 5)
            ->allowEmptyString('age_group');

        $validator
            ->scalar('color')
            ->maxLength('color', 4)
            ->allowEmptyString('color');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 6)
            ->allowEmptyString('gender');

        $validator
            ->scalar('material')
            ->maxLength('material', 10)
            ->allowEmptyString('material');

        $validator
            ->scalar('pattern')
            ->maxLength('pattern', 10)
            ->allowEmptyString('pattern');

        $validator
            ->scalar('size')
            ->maxLength('size', 10)
            ->allowEmptyString('size');

        $validator
            ->scalar('size_type')
            ->maxLength('size_type', 10)
            ->allowEmptyString('size_type');

        $validator
            ->scalar('size_system')
            ->maxLength('size_system', 10)
            ->allowEmptyString('size_system');

        $validator
            ->scalar('adwords_redirect')
            ->maxLength('adwords_redirect', 200)
            ->allowEmptyString('adwords_redirect');

        $validator
            ->scalar('custom_label_0')
            ->maxLength('custom_label_0', 10)
            ->allowEmptyString('custom_label_0');

        $validator
            ->scalar('custom_label_1')
            ->maxLength('custom_label_1', 10)
            ->allowEmptyString('custom_label_1');

        $validator
            ->scalar('custom_label_2')
            ->maxLength('custom_label_2', 10)
            ->allowEmptyString('custom_label_2');

        $validator
            ->scalar('custom_label_3')
            ->maxLength('custom_label_3', 10)
            ->allowEmptyString('custom_label_3');

        $validator
            ->scalar('custom_label_4')
            ->maxLength('custom_label_4', 10)
            ->allowEmptyString('custom_label_4');

        $validator
            ->scalar('shipping')
            ->maxLength('shipping', 10)
            ->allowEmptyString('shipping');

        $validator
            ->scalar('shipping_label')
            ->maxLength('shipping_label', 10)
            ->allowEmptyString('shipping_label');

        $validator
            ->scalar('shipping_weight')
            ->maxLength('shipping_weight', 10)
            ->allowEmptyString('shipping_weight');

        $validator
            ->scalar('shipping_length')
            ->maxLength('shipping_length', 10)
            ->allowEmptyString('shipping_length');

        $validator
            ->scalar('shipping_width')
            ->maxLength('shipping_width', 10)
            ->allowEmptyString('shipping_width');

        $validator
            ->scalar('shipping_height')
            ->maxLength('shipping_height', 10)
            ->allowEmptyString('shipping_height');

        $validator
            ->scalar('min_handling_time')
            ->maxLength('min_handling_time', 10)
            ->allowEmptyString('min_handling_time');

        $validator
            ->scalar('max_handling_time')
            ->maxLength('max_handling_time', 10)
            ->allowEmptyString('max_handling_time');

        $validator
            ->scalar('tax')
            ->maxLength('tax', 10)
            ->allowEmptyString('tax');

        $validator
            ->scalar('tax_category')
            ->maxLength('tax_category', 10)
            ->allowEmptyString('tax_category');

        $validator
            ->scalar('c:options:string')
            ->maxLength('c:options:string', 429)
            ->allowEmptyString('c:options:string');

        $validator
            ->scalar('c:manufacturer:string')
            ->maxLength('c:manufacturer:string', 10)
            ->allowEmptyString('c:manufacturer:string');

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
        $rules->add($rules->existsIn(['item_group_id'], 'ItemGroups'));
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));

        return $rules;
    }
    
    public function getCSVProducts() {
        $thisTable = $this->getThisTable();
        $products = NULL;
        
        
//        $thisTable->belongsTo('product_catalog_images',[
//            'foreignKey'=>'code',
//            'bindingKey'=>'id',
//            'joinType'=>'LEFT'
//        ]);
//        
        $data = $thisTable->find()
//                ->contain(['product_option_new'])
                ->offset(0)
                ->limit(1)
                ->all();
//        print_r($data);
        $results = $data->toArray();
        print_r($results);die();
        if(count($results)>0){
            $products = [];
        }
        
        foreach ($results as $productRcords){
            print_r($productRcords);            die();
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
}
