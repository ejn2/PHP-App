<?php

    require("../src/service/product_service.php");


    header("Content-Type: application/json");

    $productService = new ProductService();

    try {

        if(isset($_GET['id'])) {
            $id = addslashes($_GET['id']);

            if(is_numeric($id)) {
                echo $productService -> findById($id);

            }else{
                throw new ProductException("id invalido.", 400);

            }



        }else if(isset($_GET['delete'])) {

            $delete_id = addslashes($_GET['delete']);

            if(is_numeric($delete_id)) {
                $productService -> deleteById($delete_id);

            }else{
                throw new ProductException("id invalido.", 400);

            }



        }else{
            echo $productService -> findAll();

        }
    
    }catch(ProductException $e) {
        echo json_encode($e -> sendError());


    }catch(Exception $e) {
        echo json_encode(array("error" => "Internal Server Error"));

    }

?>