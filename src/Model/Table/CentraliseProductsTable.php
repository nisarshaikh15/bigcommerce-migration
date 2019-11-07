<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CentraliseProducts Model
 *
 * @method \App\Model\Entity\CentraliseProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\CentraliseProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CentraliseProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentraliseProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentraliseProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CentraliseProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class CentraliseProductsTable extends Table
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

        $this->setTable('centralise_products');
        $this->setDisplayField('CenterId');
        $this->setPrimaryKey('CenterId');
    }
    
    private function getThisTable() {
        return \Cake\ORM\TableRegistry::get('centralise_products');
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
            ->integer('CenterId')
            ->allowEmptyString('CenterId', null, 'create');

        $validator
            ->scalar('Id')
            ->allowEmptyString('Id');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 2000)
            ->allowEmptyString('Name');

        $validator
            ->scalar('Image')
            ->allowEmptyString('Image');

        $validator
            ->scalar('Code')
            ->maxLength('Code', 500)
            ->allowEmptyString('Code');

        $validator
            ->numeric('Price')
            ->allowEmptyString('Price');

        $validator
            ->numeric('SalePrice')
            ->allowEmptyString('SalePrice');

        $validator
            ->scalar('Orderable')
            ->maxLength('Orderable', 450)
            ->allowEmptyString('Orderable');

        $validator
            ->scalar('Options')
            ->allowEmptyString('Options');

        $validator
            ->scalar('Headline')
            ->allowEmptyString('Headline');

        $validator
            ->scalar('Caption')
            ->allowEmptyString('Caption');

        $validator
            ->scalar('Leaf')
            ->maxLength('Leaf', 450)
            ->allowEmptyString('Leaf');

        $validator
            ->scalar('GiftCertificate')
            ->maxLength('GiftCertificate', 450)
            ->allowEmptyString('GiftCertificate');

        $validator
            ->scalar('NeedShip')
            ->maxLength('NeedShip', 450)
            ->allowEmptyString('NeedShip');

        $validator
            ->scalar('Ypath')
            ->maxLength('Ypath', 450)
            ->allowEmptyString('Ypath');

        $validator
            ->scalar('ProductUrl')
            ->allowEmptyString('ProductUrl');

        $validator
            ->scalar('SubsectionHtml')
            ->allowEmptyString('SubsectionHtml');

        $validator
            ->scalar('CrossSell')
            ->allowEmptyString('CrossSell');

        $validator
            ->scalar('ScEnlargeTitles')
            ->allowEmptyString('ScEnlargeTitles');

        $validator
            ->scalar('Insert1')
            ->allowEmptyString('Insert1');

        $validator
            ->scalar('Insert2')
            ->allowEmptyString('Insert2');

        $validator
            ->scalar('Tab1Title')
            ->allowEmptyString('Tab1Title');

        $validator
            ->scalar('Tab1Text')
            ->allowEmptyString('Tab1Text');

        $validator
            ->scalar('Tab2Title')
            ->allowEmptyString('Tab2Title');

        $validator
            ->scalar('Tab2Text')
            ->allowEmptyString('Tab2Text');

        $validator
            ->scalar('Tab3Title')
            ->allowEmptyString('Tab3Title');

        $validator
            ->scalar('Tab3Text')
            ->allowEmptyString('Tab3Text');

        $validator
            ->integer('Added')
            ->allowEmptyString('Added');

        $validator
            ->scalar('ItemId')
            ->maxLength('ItemId', 50)
            ->allowEmptyString('ItemId');

        return $validator;
    }
    
    public function addProducts($productData) {
        $thisTable = $this->getThisTable();
        $added = FALSE;
        $products = [];
        foreach ($productData as $productRecords) {
            $dbProduct = $thisTable->newEntity();
            $dbProduct->Id = $productRecords->Id;
            $dbProduct->ItemId = $productRecords->ItemId;
            $dbProduct->Name = $productRecords->Name;
            $dbProduct->Image = $productRecords->Image;
            $dbProduct->Code = $productRecords->Code;
            $dbProduct->Price = $productRecords->Price;
            $dbProduct->SalePrice = $productRecords->SalePrice;
            $dbProduct->Orderable = $productRecords->Orderable;
            $dbProduct->Options = $productRecords->Options;
            $dbProduct->Headline = $productRecords->Headline;
            $dbProduct->Caption = $productRecords->Caption;
            $dbProduct->Leaf = $productRecords->Leaf;
            $dbProduct->GiftCertificate = $productRecords->GiftCertificate;
            $dbProduct->NeedShip = $productRecords->NeedShip;
            $dbProduct->Ypath = $productRecords->Ypath;
            $dbProduct->ProductUrl = $productRecords->ProductUrl;
            $dbProduct->SubsectionHtml = $productRecords->SubsectionHtml;
            $dbProduct->CrossSell = $productRecords->CrossSell;
            $dbProduct->ScEnlargeTitles = $productRecords->ScEnlargeTitles;
            $dbProduct->Insert1 = $productRecords->Insert1;
            $dbProduct->Insert2 = $productRecords->Insert2;
            $dbProduct->Tab1Title = $productRecords->Tab1Title;
            $dbProduct->Tab1Text = $productRecords->Tab1Text;
            $dbProduct->Tab2Title = $productRecords->Tab2Title;
            $dbProduct->Tab2Text = $productRecords->Tab2Text;
            $dbProduct->Tab3Title = $productRecords->Tab3Title;
            $dbProduct->Tab3Text = $productRecords->Tab3Text;
            array_push($products, $dbProduct);
        }
        
        if(count($products)>0){
            if($thisTable->saveMany($products)){
                $added = TRUE;
            }
        }
        return $added;
    }
    
    public function getProductOptions() {
        $thisTable = $this->getThisTable();
        $products = [];
        
        $dbRecords = $thisTable->find()
                ->where(['Code IN'=>['B1030','E1007','E1037','E1038','N1061','N1062','N1120','P1010R35','P2076','P2115R1','P2115R15','P2115R175','P2126','R1092','R1109','R1118','R1122Q15','R1122Q25','R1122Q4','R1130','R1136','R1148E15','R1148E25','R1148E4','R1148E55','R1149','R1157','R1175','R1186','R1190','R1226','R1227','R1238','R1242','R1243','R1245','R1250','R1259','R1261','R1272','R1320','R1322Q15','R1322Q25','R1322Q4','R1322Q55','R1340V15','R1340V25','R1340V4','R1341','R1343','R1344','R1345','R1346','R1347','R1360','R1361','R1362','R1363','R1365','R1375','R1384','R1405Q3','R1405Q5','R1407A15','R1407A25','R1487','R1491','R1531','R1549','R1650','R1657','R1659','R1805','R1809','R1845','R1851','R1853','R1943','R1944','R1962','S1001A1','S1001A15','S1001A25','S1001A4','S1001A55','S1001C1','S1001C15','S1001C25','S1001C4','S1001C55','S1001E1','S1001E15','S1001E25','S1001E4','S1001E55','S1001H1','S1001H15','S1001H2','S1001H25','S1001H4','S1001H55','S1001M1','S1001M2','S1001M3','S1001M45','S1001P1','S1001P15','S1001P2','S1001P3','S1001P4','S1001P5','S1001Q1','S1001Q15','S1001Q25','S1001Q4','S1001Q55','S1001R1','S1001R15','S1001R2','S1001R25','S1001R3','S1001R35','S1001R4','S1001R55','S1001T1','S1001T15','S1001T25','S1001T3','S1001T35','S1001T4','S1001T55','S1001V1','S1001V15','S1001V25','S1001V35','S1001V4','S1001V55']])
                ->select(['Code','ItemId','Name','Options'])
                //->where(['Code'=>'B1019'])
//                ->page(7)
//                ->limit(1000)
                //->orderDesc('Options')
                ->all();
        //print_r($dbRecords);
        $results = $dbRecords->toArray();
        print_r(count($results));
        foreach ($results as $productRecords) {
            if($productRecords->Options != ""){
                $dbProduct = new \App\Dto\OptionsDto();
                $dbProduct->code = $productRecords->Code;
                $dbProduct->itemId = $productRecords->ItemId;
                $dbProduct->option = $productRecords->Options;
                $dbProduct->name = $productRecords->Name;
                array_push($products, $dbProduct);
            }
        }
        
        return $products;
    }
    
    
}
