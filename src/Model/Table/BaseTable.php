<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use App\Model\Rule\NoAssociatedData;

/**
 * Description of BaseTable
 *
 * @author diegosouza
 */
abstract class BaseTable extends Table{
    public function buildRules(RulesChecker $rules){
        foreach ($this->associations()->type('HasOne') + $this->associations()->type('HasMany') as $association) {
            if ($association->dependent()) {
                $rules->addDelete(new NoAssociatedData($association), 'NoAssociatedData', [
                    'errorField' => 'error' ,
                    'message'=>__('Registro ainda possui associação.')]);
            }
        }         

        return $rules;        
    }
}
