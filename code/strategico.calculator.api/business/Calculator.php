<?php
include './interface/IOperation.php';
include './domain/Addition.php';
include './domain/Subtraction.php';
include './domain/Multiplication.php';
include './domain/Division.php';

class Calculator {
    private $operations = [];

    public function __construct() {
        $this->registerOperation('addition', new Addition());
        $this->registerOperation('subtraction', new Subtraction());
        $this->registerOperation('multiplication', new Multiplication());
        $this->registerOperation('division', new Division());
    }

    public function registerOperation($name, IOperation $operation) {
        $this->operations[$name] = $operation;
    }

    public function calculate($operationName, $operand1, $operand2) {
        if (!isset($this->operations[$operationName])) {
            throw new Exception("Error: Operación no válida");
        }

        $operation = $this->operations[$operationName];
        return $operation->calculate($operand1, $operand2);
    }
}

?>