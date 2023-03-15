<?php

    require("../src/http/request.php");
    require("../src/service/product_service.php");


    if(isset($_POST['name'])) {

        $productService = new ProductService();

        try{
            $product = Request::content();

            $productService -> save($product);

        }catch(ProductException $e) {
            echo json_encode($e -> sendError());

        }catch(ProductValidationException $e) {
            echo json_encode($e -> getAllErrors(), JSON_UNESCAPED_UNICODE);

        }
    }

?>