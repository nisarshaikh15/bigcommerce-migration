<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryCopy Model
 *
 * @property \App\Model\Table\CategoryCopyTable&\Cake\ORM\Association\BelongsTo $ParentCategoryCopy
 * @property \App\Model\Table\BcCatsTable&\Cake\ORM\Association\BelongsTo $BcCats
 * @property \App\Model\Table\CategoryCopyTable&\Cake\ORM\Association\HasMany $ChildCategoryCopy
 *
 * @method \App\Model\Entity\CategoryCopy get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategoryCopy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategoryCopy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCopy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoryCopy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoryCopy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCopy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCopy findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryCopyTable extends Table
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

        $this->setTable('category_copy');
        $this->setDisplayField('name');
        $this->setPrimaryKey('cid');

        $this->belongsTo('ParentCategoryCopy', [
            'className' => 'CategoryCopy',
            'foreignKey' => 'parent_id'
        ]);
        
        $this->hasMany('ChildCategoryCopy', [
            'className' => 'CategoryCopy',
            'foreignKey' => 'parent_id'
        ]);
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('category_copy');
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
            ->integer('cid')
            ->allowEmptyString('cid', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 113)
            ->allowEmptyString('name');

        $validator
            ->integer('length')
            ->allowEmptyString('length');

        $validator
            ->scalar('category_name_REVISED')
            ->maxLength('category_name_REVISED', 100)
            ->allowEmptyString('category_name_REVISED');

        $validator
            ->integer('length-REVISED')
            ->allowEmptyString('length-REVISED');

        $validator
            ->scalar('status')
            ->maxLength('status', 11)
            ->allowEmptyString('status');

        $validator
            ->integer('consolidate')
            ->allowEmptyString('consolidate');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentCategoryCopy'));
        
        return $rules;
    }
    
    public function getCategory($parentId) {
        $thisTable = $this->getThisTable();
        $category = NULL;
        
        $data = $thisTable->find()
                ->where(['parent_id'=> $parentId,'consolidate'=>0])
                ->select(['category_name_REVISED','cid','bc_cat_id'])
                //->limit(1)
                ->all();
        
        $results = $data->toArray();
        
        if(count($results)>0){
            $category = [];
        }
        
        foreach ($results as $productRcords){
            $categoryInfo = new \App\Dto\SubCategoryInfo();
            $categoryInfo->category = $productRcords->category_name_REVISED;
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
}
