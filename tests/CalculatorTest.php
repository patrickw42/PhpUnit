<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase {

    // used to share calculator between all test functions to avoid
    // having tocall each time
    public function setUp():void{
        //can't be $this->calc must match name it is set so it can access its
        // functions
        $this->calculator = new App\Calculator;
    }

    //used to loop through test values
    public function inputNumbers(){
        return [
            [2, 2, 4], [2.5, 2.5, 5], [-3,1,-2], [-4,-3,-7], [-2, 2.5, 0.5]
        ];
    }

    //notice the multiline comment. needed to be exactly like that to work
    // loop through inner arrays of the inputNumbers function above

    /**
     * @dataProvider inputNumbers
     */
    public function testInputNumbersAdd($x, $y, $sum) {
      //  $calc = new App\Calculator;

        $this->assertequals($sum, $this->calculator->add($x, $y));

    }



    //test Calculator.add function
    public function testAdd(){
//extract calculator class calculator.php uses App/ namespace set in .json autoload (matches app/)
     //  $calculator = new App\Calculator;
     //not needed due to setUp()

//notice you need $ for new var names and to access Calculator(lowercased)
//class. Not App\Calculator.php (namespace specified in composer.json)
// or the add() within $calculator class (called with -> syntax)
        $result = $this->calculator->add(5,20);

//this() will allow us to use all the assertions to clarify if our result
//is what it should be. One is assertequals() first arg is expected result
// and 2nd arg is actual result our program gets. Returns boolean if match
        $this->assertequals(25, $result);

        //can also set up matrix where each inner arr holds one test's
        // values (2 args and result) like so
        $values = [
            [2,2,4], [2.5,2.5,5], [-3,1,-2], [-4,-3,-7], [-2, 2.5, 0.5]
        ];
        //iterate over inner arr values comparing [2] to calc->add([0],[1])
        //using assertequals
        foreach ($values as $num) {
            $this->assertequals($num[2], $this->calculator->add($num[0],$num[1]));
        }
    }

    //test for Calculator.subtract() method
    public function testSubtract(){
      //  $calculator = new App\Calculator;

        $result = $this->calculator->subtract(20,4);
        $this->assertequals(16, $result);
    }


    //test for multiply
    public function testMultiply(){
      //  $calc = new App\Calculator;
        $res = $this->calculator->multiply(5,3);
        $this->assertequals(15,$res);

    }

    //test for division
    public function testDivision(){
      //  $calc = new App\Calculator;
        $res = $this->calculator->divide(68, 4);
        $this->assertequals(17, $res);
    }



    //test if invalid args are passed
    public function testThrowsExceptionIfNonNumericIsPassed(){
        //if we expect an exception to be thrown in this case we need
        // to set this.expectException() to the exception expected
        // notice the ( xxxx::class) syntax
        $this->expectException(InvalidArgumentException::class);
      //  $calc = new App\Calculator;
        $this->calculator->add('a', []);
    }
}