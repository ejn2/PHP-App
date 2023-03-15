<?php

    class ProductValidationException extends Exception {

        protected $errors;

        public function __construct(array $errors) {
            $this -> errors = $errors;
            parent::__construct("Validation error");
        }

        public function getAllErrors() {
            return array("errors" => $this -> errors);

        }

    }

?>