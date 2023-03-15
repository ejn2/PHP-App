<?php

    require("../src/exceptions/validation_exception.php");


    abstract class Request {

        private static function filter($data) {
            return addslashes(htmlentities($data));

        }


        private static function valid(ProductModel $product) {
            $errors = array();

            if($product -> getId() && !is_numeric($product -> getid())) {
                array_push($errors, "O campo 'id' deve ser numérico.");
            }


            if(!$product -> getName()) {
                array_push($errors, "O campo 'name' é obrigatório.");
            }

            if(strlen($product -> getName()) > 30) {
                array_push($errors, "O campo 'name' deve ter no máximo 30 caracteres.");
            }

            
            if(!$product -> getPrice()) {
                array_push($errors, "O campo 'price' é obrigatório.");
            }

            if(!is_numeric($product -> getPrice())) {
                array_push($errors, "O campo 'price' deve ser númerico");
            }

            if(!$product -> getDescription()) {
                array_push($errors, "O campo 'description' é obrigatório.");
            }

            if($errors) {
                throw new ProductValidationException($errors);
            }


        }



        public static function content(): ProductModel {
            
            $id = isset($_GET['id']) ? self::filter($_GET['id']) : null;
            $name = isset($_POST['name']) ? self::filter($_POST['name']) : null;
            $price = isset($_POST['price']) ? self::filter($_POST['price']) : null;
            $description = isset($_POST['description']) ? self::filter($_POST['description']) : null;

            $product = new ProductModel();

            $product -> setId($id);
            $product -> setName($name);
            $product -> setPrice($price);
            $product -> setDescription($description);

            self::valid($product);

            return $product;

        }

    }

?>