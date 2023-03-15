<?php


    class ProductModel {

        private $id;
        private $name;
        private $price;
        private $description;


        public function setId($id) {
            $this -> id = $id;
        }


        public function getId() {
            return $this -> id;
        }


        public function setName($name) {
            $this -> name = $name;
        }


        public function getName() {
            return $this -> name;
        }


        public function setPrice($price) {
            $this -> price = $price;
        }


        public function getPrice() {
            return $this -> price;
        }


        public function setDescription($description) {
            $this -> description = $description;
        }


        public function getDescription() {
            return $this -> description;
        }

    }

?>