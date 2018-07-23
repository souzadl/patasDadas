<?php
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\I18n\Time;

class CorAvisoHelper extends Helper {
    public function getNome(Time $data) {     
        $cor = 'green';
        if($data->isPast()){
            $cor = 'red';
        }
        if($data->isThisMonth()){
            $cor = 'yellow';
        }
        return $cor;
    }
}
