<?php
namespace Components;


class Headers{
        public function __construct(){
        }
        public function  get()
        {
                $headers = [
                    "Content-Type: application/json",
                    "Accept: application/json",
                    "api-key: b865abebbfe9282e04eb0d70af0df3c6"
                ];
            return $headers;
            
        }
}

?>