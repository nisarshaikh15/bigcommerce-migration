<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Yahoo-product-catalog Model
 *
 * @method \App\Model\Entity\Yahoo-product-catalog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Yahoo-product-catalog findOrCreate($search, callable $callback = null, $options = [])
 */
class Yahoo-product-catalogTable extends Table
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
            ->scalar('code')
            ->maxLength('code', 74)
            ->allowEmptyString('code');

        $validator
            ->scalar('caption')
            ->allowEmptyString('caption');

        $validator
            ->scalar('ship-weight')
            ->maxLength('ship-weight', 10)
            ->allowEmptyString('ship-weight');

        $validator
            ->scalar('sc-enlarge-titles')
            ->maxLength('sc-enlarge-titles', 10)
            ->allowEmptyString('sc-enlarge-titles');

        $validator
            ->scalar('abstract')
            ->maxLength('abstract', 133)
            ->allowEmptyString('abstract');

        $validator
            ->scalar('cross-sell')
            ->maxLength('cross-sell', 365)
            ->allowEmptyString('cross-sell');

        $validator
            ->scalar('product-url')
            ->maxLength('product-url', 113)
            ->allowEmptyString('product-url');

        $validator
            ->scalar('tab-2-text')
            ->maxLength('tab-2-text', 223)
            ->allowEmptyString('tab-2-text');

        $validator
            ->scalar('sale-price')
            ->maxLength('sale-price', 4)
            ->allowEmptyString('sale-price');

        $validator
            ->scalar('tab-1-text')
            ->allowEmptyString('tab-1-text');

        $validator
            ->scalar('tab-1-title')
            ->maxLength('tab-1-title', 28)
            ->allowEmptyString('tab-1-title');

        $validator
            ->scalar('orderable')
            ->maxLength('orderable', 14)
            ->allowEmptyString('orderable');

        $validator
            ->scalar('label')
            ->maxLength('label', 3)
            ->allowEmptyString('label');

        $validator
            ->scalar('need-ship')
            ->maxLength('need-ship', 3)
            ->allowEmptyString('need-ship');

        $validator
            ->scalar('ypath')
            ->maxLength('ypath', 12)
            ->allowEmptyString('ypath');

        $validator
            ->scalar('options')
            ->maxLength('options', 558)
            ->allowEmptyString('options');

        $validator
            ->scalar('tab-3-title')
            ->maxLength('tab-3-title', 253)
            ->allowEmptyString('tab-3-title');

        $validator
            ->scalar('subsection-html')
            ->maxLength('subsection-html', 93)
            ->allowEmptyString('subsection-html');

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
            ->scalar('sale-price-override')
            ->maxLength('sale-price-override', 16)
            ->allowEmptyString('sale-price-override');

        $validator
            ->scalar('alternate-subsection')
            ->maxLength('alternate-subsection', 3)
            ->allowEmptyString('alternate-subsection');

        $validator
            ->scalar('tab-2-title')
            ->maxLength('tab-2-title', 29)
            ->allowEmptyString('tab-2-title');

        $validator
            ->scalar('gift-certificate')
            ->maxLength('gift-certificate', 12)
            ->allowEmptyString('gift-certificate');

        $validator
            ->scalar('price')
            ->maxLength('price', 6)
            ->allowEmptyString('price');

        $validator
            ->scalar('tab-3-text')
            ->maxLength('tab-3-text', 465)
            ->allowEmptyString('tab-3-text');

        $validator
            ->scalar('regular-price-override')
            ->maxLength('regular-price-override', 1)
            ->allowEmptyString('regular-price-override');

        $validator
            ->scalar('name')
            ->maxLength('name', 126)
            ->allowEmptyString('name');

        return $validator;
    }
}
