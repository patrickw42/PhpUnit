<?php
// require_once "./Calculator.php";  //can use namespace instead

use App\Calculator; /*same as doing use App\Calculator as Calculator.
Notice we use \ not \\ even though namespace. //only needed for autoload*/


// If the submit button has been pressed
if (isset($_POST['submit'])) {

    // Check number values
    if (is_numeric($_POST['number1']) && is_numeric($_POST['number2'])) {
        //request calculator class (required above)
        $calculator = new Calculator;

        // Calculate total
        if ($_POST['operation'] == 'plus') {
            //notice the -> syntax instead of . to access class members
            $total = $calculator->add($_POST['number1'], $_POST['number2']);
        } else if ($_POST['operation'] == 'minus') {
            $total = $calculator->subtract($_POST['number1'], $_POST['number2']);
        } else if ($_POST['operation'] == 'times') {
            $total = $calculator->multiply($_POST['number1'], $_POST['number2']);
        } else if ($_POST['operation'] == 'divided by') {
            $total = $calculator->divide($_POST['number1'], $_POST['number2']);
        }

        // outputs the calculation and result
        echo "<h1>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals {$total}</h1>";

    } else {

        // Print error message to the browser and throw exception
        echo 'Numeric values are required';
        throw new InvalidArgumentException;
    }
}
