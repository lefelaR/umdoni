<?php

namespace Components;

class SyetemOptions 
{

        public function TenderOptioins():array
        {
            return $options = array(
                    "1" => "Current",
                    "2" =>"Open",
                    "3" => "Awarded",
                    "4" => "Closed"
            );
        }




}