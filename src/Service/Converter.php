<?php

namespace App\Service;

class Converter
{
    private $devise;
    private $target_devise;
    private $taux;

    public function __construct($devise, $target_devise, $taux)
    {
        $this->devise = $devise;
        $this->target_devise = $target_devise;
        $this->taux = $taux;
    }


    public function convert($price){
        return $price . " " . $this->devise  . " ets egale a " . ($price * $this->taux ) . " " . $this->target_devise;
    }
}
