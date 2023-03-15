<?php

    require("../src/dao/product_dao.php");


    class ProductService {

        public function __construct() {
            $this -> productDAO = new ProductDAO();

        }


        public static function jsonParser(array $data) {
            return json_encode($data, JSON_NUMERIC_CHECK);

        }


        public function findAll(): string {
            return self::jsonParser($this -> productDAO -> findAll());

        }


        public function findById(int $id): string{
            return self::jsonParser($this -> productDAO -> findById($id));

        }


        public function save(ProductModel $product) {
            $this -> productDAO -> save($product);

        }


        public function deleteById(int $id) {
            $this -> productDAO -> deleteById($id);
        }

    }

?>