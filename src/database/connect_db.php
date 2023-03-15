<?php

    abstract class ConnectDB {

        public function __construct() {
            $this -> pdo = $this -> connect();

        }

        private function connect() {
            return new PDO("mysql:host=localhost;dbname=phpapps", "cell-pc", "");

        }

    }

?>