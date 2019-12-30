<?php
namespace App\Controller;

use App\Controller\AppController;
use Bigcommerce\Api\Client AS Bigcommerce;

/**
 * Bigcommerce Controller
 *
 *
 * @method \App\Model\Entity\Bigcommerce[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BigcommerceController extends AppController
{
    public function createProduct() {
        set_time_limit(60000);
        $controllerTime = time();
        echo json_encode("controller request time ===> ".$controllerTime)."\n";
        
        $this->autoRender = FALSE;
//        $yahooProducyTable = new \App\Model\Table\YahooProductCatalogCopyTable();
        $yahooProducyTable = new \App\Model\Table\YahooProductCatalogTable();
        $productData = $yahooProducyTable->getCSVProducts();
        
        
        
        
        foreach ($productData as $productRecord){
            $productInfo = new \App\Dto\BcProductInfoDto();
            $productInfo->name = $productRecord->name;
            $productInfo->price = $productRecord->price;
            //$productInfo->retail_price = $productRecord->price;
            if($productRecord->salePrice){
                $productInfo->sale_price = $productRecord->salePrice;
            }
            //$productInfo->inventory_level = 10;
            $productInfo->sku = $productRecord->productId;
            $productInfo->inventory_tracking = 'none';
            $productInfo->description = $productRecord->description == NULL ?"":$productRecord->description;
            $productInfo->categories = [$productRecord->categoryId];
            //$productInfo->images = [];
            $productInfo->images = $this->getImages($productRecord->images,$productRecord->additionalImages);
            
            $productInfo->variants = $this->getVariants($productRecord->productId,$productRecord->price,$productRecord->salePrice);
            
            $productDetails = \App\Utils\BigCommerce::createProduct(json_encode($productInfo));
//            echo '<pre>';
//            print_r($productDetails);
            if($productDetails != null){
                if($productDetails->data->options){
                    $optionId = $this->getOptionId($productDetails->data->options);
                    $optionDetails = $this->updateOption($productDetails->data->options,$productRecord->productId);
                    $productId = $productDetails->data->id;
                    $productIdAdded = $yahooProducyTable->addProductId($productRecord->productId,$productDetails->data->id,implode(',', $optionId));
                    echo '<pre>';
                    print_r($optionId);
                    foreach ($optionId as $options) {
                        $productDetails = \App\Utils\BigCommerce::updateProductOptions($productId,$options); 
                    }
                }
            }else{
                echo "Response Is Empty";
            }
            $controllerTime = time();
            echo json_encode("controller request end time ===> ".$controllerTime)."\n";
        
        }
        
        //echo json_encode($productInfo);
    }
    private function getOptionId($optionIdList) {
        $optionId = [];
        foreach ($optionIdList as $options) {
            array_push($optionId, $options->id);
        }
        if(count($optionId)>0){
//            return implode(',', $optionId);
            return $optionId;
        }else{
            return NULL;
        }
    }
    
    private function updateOption($optionList,$productId) {
        foreach ($optionList as $options) {
            foreach ($options->option_values as $option) {
                $productOptionTable = new \App\Model\Table\ProductOptionFinalTable();
                $productData = $productOptionTable->updateOption($option->label,$productId,$options->id,$option->id);
            }
        }
    }
    
    public function updateProductOptions() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        //$productDetails = \App\Utils\BigCommerce::getProductOptions(138);
        $yahooProducyTable = new \App\Model\Table\YahooProductCatalogCopyTable();
        //$yahooProducyTable = new \App\Model\Table\YahooProductCatalogTable();
        $productInfo = $yahooProducyTable->getProductOption();
        foreach ($productInfo as $productData) {
            foreach ($productData->optionId as $options) {
                $productDetails = \App\Utils\BigCommerce::updateProductOptions($productData->productId,$options); 
            }
        }
        
    }
    private function getImages($image,$additionalImages) {
        if($image == "" || $image == NULL ){
            return [];
        }
        $images = [];
        
        $imageInfo = new \App\Dto\BcImagesInfoDto();
        $imageInfo->is_thumbnail = TRUE;
        $imageInfo->image_url = $image;
        
        array_push($images, $imageInfo);
        if($additionalImages != NULL && $additionalImages != ""){
            $additionalImage = explode(',', $additionalImages);

            foreach ($additionalImage as $imageRecord){
                $imageInfo = new \App\Dto\BcImagesInfoDto();
                $imageInfo->is_thumbnail = FALSE;
                $imageInfo->image_url = $imageRecord;

                array_push($images, $imageInfo);
            }
        }
        return $images;
    }
    
    private function getVariants($productId,$price,$salePrice) {
        $productOptionTable = new \App\Model\Table\ProductOptionFinalTable();
        $optionNames = $productOptionTable->getOptionNames($productId);
        $optionCount = count($optionNames);
        if($optionCount>0){
            $optionInfo = [];
            foreach ($optionNames as $optionRecord){
                $optionValues = $productOptionTable->getOption($optionRecord,$productId);
                array_push($optionInfo, $optionValues);
            }
            $mainOptionArr = [];
            $shortcode1 = 0;
            foreach ($optionInfo[0]->optionValue as $options1){
                $optionData1 = $this->createBcOptions($optionInfo[0]->optionName, $options1);
                if($optionCount==1){
                    $optionArr = [];
                    array_push($optionArr, $optionData1);
                    $variantOptionDetails = new \App\Dto\VariantOptionDto();
                    $variantOptionDetails->option_values = $optionArr;
                    $variantOptionDetails->sku = $productId."-".$optionInfo[0]->shortCodes[$shortcode1];
                    $variantOptionDetails->price = $this->getPrice($price,$optionData1);
                    $variantOptionDetails->retail_price = $this->getPrice($price,$optionData1);
                    if($salePrice){
                        $variantOptionDetails->sale_price = $this->getPrice($salePrice,$optionData1);
                        
                    }
                    array_push($mainOptionArr, $variantOptionDetails);
                }
                if($optionCount>1){
                    $shortcode2 = 0;
                    foreach ($optionInfo[1]->optionValue as $options2){
                        
                        $optionData2 = $this->createBcOptions($optionInfo[1]->optionName, $options2);
                        if($optionCount==2){
                            $optionArr = [];
                            array_push($optionArr, $optionData1);
                            array_push($optionArr, $optionData2);
                            
                            $variantOptionDetails = new \App\Dto\VariantOptionDto();
                            $variantOptionDetails->option_values = $optionArr;
                            $variantOptionDetails->sku = $productId."-".$optionInfo[1]->shortCodes[$shortcode2]."-".$optionInfo[0]->shortCodes[$shortcode1];
                            $variantOptionDetails->price = $this->getPrice($price,$optionData1,$optionData2);
                            $variantOptionDetails->retail_price = $this->getPrice($price,$optionData1,$optionData2);
                            if($salePrice){
                                $variantOptionDetails->sale_price = $this->getPrice($salePrice,$optionData1,$optionData2);
                                
                            }
                            array_push($mainOptionArr, $variantOptionDetails);
                        }
                        if($optionCount>2){
                            $shortcode3 = 0;
                            foreach ($optionInfo[2]->optionValue as $options3){
                                $optionName = $optionInfo[2]->optionName;
                                $optionData3 = $this->createBcOptions($optionName, $options3);
                                if($optionCount==3){
                                    $optionArr = [];
                                    array_push($optionArr, $optionData1);
                                    array_push($optionArr, $optionData2);
                                    array_push($optionArr, $optionData3);
                                    
                                    $variantOptionDetails = new \App\Dto\VariantOptionDto();
                                    $variantOptionDetails->option_values = $optionArr;
                                    $variantOptionDetails->sku = $productId."-".$optionInfo[2]->shortCodes[$shortcode3]."-".$optionInfo[1]->shortCodes[$shortcode2]."-".$optionInfo[0]->shortCodes[$shortcode1];
                                    $variantOptionDetails->price = $this->getPrice($price,$optionData1,$optionData2,$optionData3);
                                    $variantOptionDetails->retail_price = $this->getPrice($price,$optionData1,$optionData2,$optionData3);
                                    if($salePrice){
                                        $variantOptionDetails->sale_price = $this->getPrice($salePrice,$optionData1,$optionData2,$optionData3);
                                        
                                    }
                                    array_push($mainOptionArr, $variantOptionDetails);
                                }
                                if($optionCount>3){
                                    $shortcode4 = 0;
                                    foreach ($optionInfo[3]->optionValue as $options4){
                                        $optionName = $optionInfo[3]->optionName;
                                        $optionData4 = $this->createBcOptions($optionName, $options4);
                                        if($optionCount==4){
                                            $optionArr = [];
                                            array_push($optionArr, $optionData1);
                                            array_push($optionArr, $optionData2);
                                            array_push($optionArr, $optionData3);
                                            array_push($optionArr, $optionData4);
                                            
                                            $variantOptionDetails = new \App\Dto\VariantOptionDto();
                                            $variantOptionDetails->option_values = $optionArr;
                                            $variantOptionDetails->sku = $productId."-".$optionInfo[0]->shortCodes[$shortcode1]."-".$optionInfo[1]->shortCodes[$shortcode2]."-".$optionInfo[2]->shortCodes[$shortcode3]."-".$optionInfo[3]->shortCodes[$shortcode4];
                                            $variantOptionDetails->price = $this->getPrice($price,$optionData1,$optionData2,$optionData3,$optionData4);
                                            $variantOptionDetails->retail_price = $this->getPrice($price,$optionData1,$optionData2,$optionData3,$optionData4);
                                            if($salePrice){
                                                $variantOptionDetails->sale_price = $this->getPrice($salePrice,$optionData1,$optionData2,$optionData3,$optionData4);
                                                
                                            }
                                            array_push($mainOptionArr, $variantOptionDetails);
                                        }
                                        $shortcode4++;
                                    }
                                }
                                $shortcode3++;
                            }
                        }
                        $shortcode2++;
                    }
                }
                $shortcode1++;
            }
            return $mainOptionArr;
        }
    }
    private function createBcOptions($optionName,$optionValue) {
        $optionDetails = new \App\Dto\OptionDetailsDto();
        $optionDetails->option_display_name = $optionName;
        $optionDetails->label = $optionValue;
        
        return $optionDetails;
    }
    
    private function getPrice($price,$optionData1,$optionData2=null,$optionData3=null,$optionData4=null) {
        $search = '$';
        $extraPrice = 0;
        if($optionData1 != null){
            if(preg_match("/{$search}/i", $optionData1->label)){
                $dollarPos = strpos($optionData1->label, '$');
                if(strpos($optionData1->label, '$')){
                    $extraPrice = intval(substr($optionData1->label,$dollarPos + 1));
                }
            }
        }
        if($optionData2 != null){
            if(preg_match("/{$search}/i", $optionData2->label)){
                $dollarPos = strpos($optionData2->label, '$');
                
                if(strpos($optionData2->label, '$')){
                    $extraPrice = $extraPrice + intval(substr($optionData2->label,$dollarPos + 1));
                }
                
                
            }
        }
        if($optionData3 != null){
            if(preg_match("/{$search}/i", $optionData3->label)){
                $dollarPos = strpos($optionData3->label, '$');
                if(strpos($optionData3->label, '$')){
                    $extraPrice = $extraPrice + intval(substr($optionData3->label,$dollarPos + 1));
                }
            }
        }
        if($optionData4 != null){
            if(preg_match("/{$search}/i", $optionData4->label)){
                $dollarPos = strpos($optionData4->label, '$');
                if(strpos($optionData4->label, '$')){
                    $extraPrice = $extraPrice + intval(substr($optionData4->label,$dollarPos + 1));
                }
            }
        }
        //print_r('price '.$extraPrice);
        return intval($price) + $extraPrice;
    }
    
    public function createCategory() {
        $this->autoRender = FALSE;
        set_time_limit(6000);
        $categoryTable = new \App\Model\Table\CategoryCopyTable();
        //$categoryTable = new \App\Model\Table\CategoryTable();
        
        $category = $categoryTable->getCategory(0);
        foreach ($category as $categoryInfo){
            
              //to Add main Category
            $response = $this->createCategoryBg($categoryInfo,$categoryInfo->parentId);
            $categoryId = json_decode($response);
            $added = $categoryTable->addBcCategory($categoryId->data->id, $categoryInfo->categoryId);
            
            $categoryInfo->subCategory = $categoryTable->getCategory($categoryInfo->categoryId);
            
            if($categoryInfo->subCategory != NULL){
                foreach ($categoryInfo->subCategory as $subCategoryInfo){
                    //To add sub Category
//                    $response = $this->createCategoryBg($subCategoryInfo,$categoryInfo->parentId);
//                    $categoryId = json_decode($response);
//                    $added = $categoryTable->addBcCategory($categoryId->data->id, $subCategoryInfo->categoryId);
            
                    $subCategoryInfo->subCategory = $categoryTable->getCategory($subCategoryInfo->categoryId);
                    if($subCategoryInfo->subCategory != NULL){
                        foreach ($subCategoryInfo->subCategory as $subCategoryList){
                            //To add sub sub Category
//                            $response = $this->createCategoryBg($subCategoryList,$subCategoryInfo->parentId);
//                            $categoryId = json_decode($response);
//                            $added = $categoryTable->addBcCategory($categoryId->data->id, $subCategoryList->categoryId);

                        }
                    }
                    
                }
            }
            
        }
        
    }
    
    private function createCategoryBg($categoryInfo,$parentId=null) {
        if($parentId == NULL){
            $parentId = 0;
        }
        
        $categoryDetails = new \App\Dto\AddCategoryDto();
        $categoryDetails->parent_id = $parentId;
        $categoryDetails->name = $categoryInfo->category;
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v3/catalog/categories",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($categoryDetails),
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            "x-auth-client: ".CLIENT_ID,
            "x-auth-token: ".AUTH_TOKEN
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    
    
    public function createOptions() {
        $this->autoRender = FALSE;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.bigcommerce.com/stores/dtqhl933vb/v3/catalog/products/117/options",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"data\":[{\"product_id\":117,\"name\":\"Color\",\"display_name\":\"Color\",\"type\":\"swatch\",\"sort_order\":0,\"option_values\":[{\"label\":\"Red\",\"sort_order\":1,\"value_data\":{\"colors\":[\"#ff0000\"]},\"is_default\":false},{\"label\":\"Green\",\"sort_order\":2,\"value_data\":{\"colors\":[\"#008000\"]},\"is_default\":false},{\"label\":\"Blue\",\"sort_order\":3,\"value_data\":{\"colors\":[\"#0000ff\"]},\"is_default\":false}],\"config\":[]},{\"product_id\":117,\"name\":\"Size\",\"display_name\":\"T-Shirt Size\",\"type\":\"rectangles\",\"sort_order\":1,\"option_values\":[{\"label\":\"Small\",\"sort_order\":0,\"value_data\":null,\"is_default\":false},{\"label\":\"Medium\",\"sort_order\":1,\"value_data\":null,\"is_default\":false},{\"label\":\"Large\",\"sort_order\":2,\"value_data\":null,\"is_default\":false}],\"config\":[]}],\"meta\":{\"pagination\":{\"total\":2,\"count\":2,\"per_page\":50,\"current_page\":1,\"total_pages\":1,\"links\":{\"current\":\"?page=1&limit=50\"}}}}",
            CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            "x-auth-client: dlabt7o129ofx3mfoq7jgqj2l9yibks",
            "x-auth-token: tcf7ruoha459kp40h0hhl2a42ecblfb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    
    public function createCustomer() {
        $this->autoRender = FALSE;
        echo json_encode("controller request time ===> ".time())."\n";
        set_time_limit(60000);
        $customerTable = new \App\Model\Table\CustomerTable();
        
        $customers = $customerTable->getCustomers();
        foreach ($customers as $customerData) {
            //echo json_encode($customerData);
            $customerDetails = \App\Utils\BigCommerce::createCustomer(json_encode($customerData));
            echo '<pre>';
            print_r($customerData[0]->email);
            $customerTable->updateCustomers($customerData[0]->email,$customerDetails->data[0]->id);
        }
        echo json_encode("controller end time ===> ".time())."\n";
    }
    
    public function createOrder() {
        $this->autoRender = FALSE;
        echo json_encode("controller request time ===> ".time())."\n";
        
        $orderHeaderTable = new \App\Model\Table\OrderheaderTable();
        
        $orders = $orderHeaderTable->getOrders();
        
        foreach ($orders as $orderData) {
//            echo '<pre>';
//            print_r($orderData);
            $productDetails = \App\Utils\BigCommerce::createOrder(json_encode($orderData));
        }
        echo json_encode("controller end time ===> ".time())."\n";
        
    }
    
    
}
