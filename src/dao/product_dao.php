<?php

    require("../src/exceptions/product_exception.php");
    require("../src/database/connect_db.php");
    require("../src/models/product_model.php");


    class ProductDAO extends ConnectDB {


        // *********** Find All ***********

        public function findAll(): array {


            $sql = "SELECT id, name, price, description FROM product";

            $cmd = $this -> pdo -> query($sql);

            $cmd -> execute();

            return $cmd -> fetchall(PDO::FETCH_ASSOC);

        }



        // *********** Find by id ***********


        public function findById(int $id): array {

            $sql = "SELECT id, name, price, description FROM product WHERE id = ?";

            $cmd = $this -> pdo -> prepare($sql);

            $cmd -> bindValue(1, $id);

            $cmd -> execute();

            $response = $cmd -> fetch(PDO::FETCH_ASSOC);

            if(!$response) {
                throw new ProductException("Product not found", 404);

            }

            return $response;


        }



        // *********** SAVE / UPDATE ***********

        public function save(ProductModel $product) {

            if($product -> getId()) {

                $this -> findById($product -> getId());

                $sql = "UPDATE product SET name = ?, price = ?, description = ? WHERE id = ?";

                $cmd = $this -> pdo -> prepare($sql);

                $cmd -> bindValue(4, $product -> getId());


            }else{
                $sql = "INSERT INTO product (name, price, description) VALUES (?,?,?)";

                $cmd = $this -> pdo -> prepare($sql);
            }

            $cmd -> bindValue(1, $product -> getName());
            $cmd -> bindValue(2, $product -> getPrice());
            $cmd -> bindValue(3, $product -> getDescription());

            try{
                $this -> pdo -> beginTransaction();

                $cmd -> execute();

                $this -> pdo -> commit();

            }catch(Exception $e) {
                $this -> pdo -> rollback();

            }

        }



        // *********** DELETE ***********

        public function deleteById(int $id) {

            $this -> findById($id);

            $sql = "DELETE FROM product WHERE id = ?";

            $cmd = $this -> pdo -> prepare($sql);

            $cmd -> bindValue(1, $id);

            try{
                $this -> pdo -> beginTransaction();

                $cmd -> execute();

                $this -> pdo -> commit();

            }catch(Exception $e){
                $this -> pdo -> rollback();

            }

        }


    }

?>