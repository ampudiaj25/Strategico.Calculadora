<?php

class Addition implements IOperation {
    public function calculate($operand1, $operand2) {
        return $operand1 + $operand2;
    }
}

?>