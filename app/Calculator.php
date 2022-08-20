<?php

namespace App;

class Calculator{

    public function add($num1, $num2) {
//include check for invalid args tested with testThrowsExceptionIfNonNumericPassed()
        if (! is_numeric($num1) or ! is_numeric($num2)) {
    // MUST add \ before to signify it isn't one of our global classes
            throw new \InvalidArgumentException;
        }

        return $num1 + $num2;
    }

    public function subtract($num1, $num2) {
        return $num1 - $num2;
    }

    public function multiply($num1, $num2) {
        return $num1 * $num2;
    }

    public function divide($num1, $num2) {
        return $num1 / $num2;
    }
}