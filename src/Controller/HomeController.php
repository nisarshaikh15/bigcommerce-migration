<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    
    public function index() {
        $this->autoRender = FALSE;
        
        echo "working";
    }
    
    public function addOrders() {
        $this->autoRender = FALSE;
        
        $orderHeaderTable = new \App\Model\Table\OrderheaderTable();
        $orderData = $orderHeaderTable->getOrders();
        
        $centralisedOrderTable = new \App\Model\Table\CentralizedOrderTable();
        $orderAdded = $centralisedOrderTable->addOrders($orderData);
    }
    
    public function addProducts() {
        $this->autoRender = FALSE;
        
        $productTable = new \App\Model\Table\YahooProductCatalogTable();
        $productData = $productTable->getProducts();
        print_r(count($productData));
        $centralisedOrderTable = new \App\Model\Table\CentraliseProductsTable();
        $orderAdded = $centralisedOrderTable->addProducts($productData);
        if($orderAdded){
            echo "Products Added Successfully";
        }else{
            echo "Products Added Failed";
        }
    }
    
    
    public function addOptions() {
        $this->autoRender = FALSE;
        
        $centralisedProductTable = new \App\Model\Table\CentraliseProductsTable();
        $optionData = $centralisedProductTable->getProductOptions();
        foreach ($optionData as $optionRecord){
            $optionArr = [];
            $option = explode("\n", $optionRecord->option);
            foreach ($option as $optionTemp){
                if($optionTemp == ""){
                    continue;
                }
                $optionTemp = ltrim($optionTemp,"\"");
                if(strpos( $optionTemp,"\"") ){
                    $options = explode("\"", $optionTemp);
                }else{
                    $options = explode(" ", $optionTemp);
                }
                
                $optionInfo = new \App\Dto\OptionInfoDto();
                if($options[0] != ""){
                    $optionInfo->optionName = $options[0];
                    $n = 1;
                }else{
                    $optionInfo->optionName = $options[1];
                    $n = 2;
                }
                $optionValues = [];
                for($i=$n;$i<count($options);$i++){
                    if($options[$i] != " " && $options[$i] != ""){
                        array_push($optionValues, $options[$i]);
                    }
                    
                }
                $optionInfo->optionValues = $optionValues;
                array_push($optionArr, $optionInfo);
            
                
            }
            $optionRecord->option = $optionArr;    
        }
        //print_r($optionData);
        $productOptionTable = new \App\Model\Table\ProductOptionNewTable();
        $optionAdded = $productOptionTable->addOptions($optionData);
        if($optionAdded){
            echo 'Option Added ';
        }else{
            echo 'option not added';
        }
    }
    
    public function addProductVariations() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        $itemTable = new \App\Model\Table\ItemTable();
        $variationData = $itemTable->getVariationData();
        
        print_r(count($variationData));
        $variationTable = new \App\Model\Table\CentraliseProductVariantTable();
        $variationAdded = $variationTable->addVariationData($variationData);
        
        if($variationAdded){
            echo 'Added Successfully';
        }  else {
            echo 'Not Added';
        }
    }
    
    public function addCategory() {
        $this->autoRender = FALSE;
        
        $yahooTable = new \App\Model\Table\YahooProductCatalogTable();
        $categoryData = $yahooTable->getCategory();
        
        $categoryTable = new \App\Model\Table\CategoryTable();
        $categoryAdded = $categoryTable->addCategory($categoryData);
        
        
        if($categoryAdded){
            echo 'Added Successfully';
        }  else {
            echo 'Not Added';
        }
    }
    
    public function addSubCategory() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        $level = 0;
        $categoryTable = new \App\Model\Table\CategoryTable();
        $categoryList = $categoryTable->getCategory($level);
        
        $yahooTable = new \App\Model\Table\YahooProductCatalogTable();
        
        foreach ($categoryList as $category) {
            $categoryData = $yahooTable->getSubCategory($category->category);
            
            $categoryAdded = $categoryTable->addSubCategory($categoryData,$category->categoryId,$level);
            if($categoryAdded){
                echo 'Added Successfully \n';
            }  else {
                echo 'Not Added \n';
            }
            break;
        }
        
    }
    
    public function createSku() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        
        $variationTable = new \App\Model\Table\CentraliseProductVariantTable();
        $variationSkuAdded = $variationTable->createSku($variationData);
        
        if($variationSkuAdded){
            echo 'Added Successfully \n';
        }  else {
            echo 'Not Added \n';
        }
    }
    
    public function createOptions() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        $categoryTable = new \App\Model\Table\CategoryTable();
        $newOptions = $categoryTable->getCategoryProduct();
        
        $productCopyTable = new \App\Model\Table\YahooProductCatalogCopyTable();
        $productAdded = $productCopyTable->addProducts($newOptions);
        
        if($productAdded){
            $productOptionTable = new \App\Model\Table\ProductOptionNewTable();
            foreach ($newOptions as $optionData) {
                $productOptionTable->addCopyOptions($optionData->options);
            }            
        }
    }
    
    public function addBcOptions() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        
        $orderlineTable = new \App\Model\Table\OrderlineTable();
        $orders = $orderlineTable->getOrders();
        
        $optionTable = new \App\Model\Table\ProductOptionFinalTable();
        foreach ($orders as $orderInfo) {
            $sizeInfo = NULL;
            $colorInfo = NULL;
            $styleInfo = NULL;
            $sizeInfo = $optionTable->getOptionDetails($orderInfo->sizeLable, $orderInfo->productId,$orderInfo->sizeNumber);
            if($orderInfo->colorLable){
                $colorInfo = $optionTable->getOptionDetails($orderInfo->colorLable, $orderInfo->productId,$orderInfo->colorNumber);
            }
            if($orderInfo->styleLable){
                $styleInfo = $optionTable->getOptionDetails($orderInfo->styleLable, $orderInfo->productId,$orderInfo->styleNumber);
            }
            
            $orders = $orderlineTable->updateOrdersOptionId($orderInfo->itemCode,$sizeInfo,$colorInfo,$styleInfo);
        }
    }
}
