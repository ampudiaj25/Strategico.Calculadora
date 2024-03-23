<?php

class Division implements IOperation {
    public function calculate($operand1, $operand2) {
        if ($operand2 == 0) {
            throw new Exception("Error: No se puede dividir por cero");
        }
        
        return $operand1 / $operand2;
    }
}

?>