<?php
namespace  Calculator;
//setting up an interface in case you would want to create another type of calculator, maybe a scientific calculator or something
interface Calculator
{
    public function addResult();
    public function subtractResult();
    public function multipyResult();
    public function divideResult();
}

class SimpleCalculator implements Calculator
{
    private $number1;
    private $number2;
    private $result;
    private $msg;

    public function __construct($num1, $num2)
    {
        $this->number1 = $num1;
        $this->number2 = $num2;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    //methods to add,subtract, multipy and divide
    public function addResult()
    {
        $this->result = $this->number1 + $this->number2;
        $this->msg = 'The sum of '.$this->number1.' and '.$this->number2.' is '.$this->result;
    }

    public function subtractResult()
    {
        $this->result = $this->number1 - $this->number2;
        $this->msg = 'The result of '.$this->number1.' - '.$this->number2.' is '.$this->result;
    }

    public function multipyResult()
    {
        $this->result = $this->number1 * $this->number2;
        $this->msg = 'The product of '.$this->number1.' times '.$this->number2.' is '.$this->result;
    }

    public function divideResult()
    {

        $this->result = $this->number1 / $this->number2;
        $this->msg = 'The quotient of '.$this->number1.' divided by '.$this->number2.' is '.$this->result;
    }

}


$msg='';
// make sure all arguments are present
if (!empty($argv[1]) && !empty($argv[2]) && !empty($argv[3])) {
    // make sure the numbers are infact numbers
    if (is_numeric($argv[1]) && is_numeric($argv[3])) {
        //instance of simpleCalculator
        $simpleCalc = new SimpleCalculator($argv[1], $argv[3]);
        // see which operation we need to perform
        switch (trim($argv[2])) {
            case '+':
                $simpleCalc->addResult();
                break;

            case '-':
                $simpleCalc->subtractResult();
                break;

            case '*':
                $simpleCalc->multipyResult();
                break;

            case '/':
                $simpleCalc->divideResult();
                break;

            default:
                // invalid operator
                //print"You must use either +,-,* or /";
        }

        // Get the msg and print
        $msg = $simpleCalc->getMsg();
        if (!empty($msg)) {
            print $msg;
        }
    } else {
        //non numeric values
        //print "Your input must be numeric";
    }
} else {
    // missing arguments
    print "You must format arguments like 1 + 1";
}
