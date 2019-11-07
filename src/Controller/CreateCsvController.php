<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CreateCsv Controller
 *
 *
 * @method \App\Model\Entity\CreateCsv[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CreateCsvController extends AppController
{
    public function createCsv() {
        $this->autoRender = FALSE;
        
        $yahooProducyTable = new \App\Model\Table\YahooProductCatalogTable();
        $productData = $yahooProducyTable->getCSVProducts();
        
        $productOptionTable = new \App\Model\Table\ProductOptionNewTable();
        foreach ($productData as $productRecord){
            $optionNames = $productOptionTable->getOptionNames($productRecord->productId);
            print_r($optionNames);
            if(count($optionNames)>0){
            $optionInfo = [];
                foreach ($optionNames as $optionRecord){
                    $optionValues = $productOptionTable->getOption($optionRecord,$productRecord->productId);
                    array_push($optionInfo, $optionValues);
                }
                $this->createProductName($optionInfo);
            }
        }
    }
    
    private function createProductName($optionInfo){
        $mainOptionName = [];
        $optionValues = [];
        $optionCount = count($optionInfo);
        
        foreach ($optionInfo[0]->optionValue as $optionValue){
            
            $optionName = $this->createProductOptionName($optionInfo[0]->optionName,$optionValue);
            $level1 = $optionName;
            
            if($optionCount>1){
                
                foreach ($optionInfo[1]->optionValue as $optionValue1){
                    $optionName2 = $this->createProductOptionName($optionInfo[1]->optionName,$optionValue1);
                    
                    $level1 = $level1.",".$optionName2;
                    print_r($optionValues); 
                    if($optionCount>2){
                        foreach ($optionInfo[2]->optionValue as $optionValue2){
                            $optionName3 = $this->createProductOptionName($optionInfo[1]->optionName,$optionValue2);
                            $level1 = $level1.",".$optionName3;
                            if($optionCount == 3){
                                array_push($optionValues, $level1);
                            }
                        }
                    }
                    if($optionCount == 2){
                        array_push($optionValues, $level1);
                    }
                }
            }
            if($optionCount == 1){
                array_push($optionValues, $level1);
            }
        }
        
            print_r($optionValues);die();
    }
    
    private function createProductOptionName($optionName,$optionValue) {
        return $optionName.'='.$optionValue;
    }
}
