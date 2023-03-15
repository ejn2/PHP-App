<?php


    class ProductException extends Exception {

        protected $message;
        protected $code;

        public function __construct(string $message, int $code = 0) {
            $this -> message = $message;
            $this -> code = $code;
            parent::__construct($message, $code);
        }

        public function sendError() {
            return array("code" => $this -> code, "message" => $this -> message);
        }

    }

?>