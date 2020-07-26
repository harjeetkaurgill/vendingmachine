<?php

class Vending
{ 
    var $product = '';
    var $amount = 0;
    var $price = 0;
    var $remainingamount = 0;
    
    function __construct($product, $amount, $price)
    {
        $this->product = $product;
        $this->amount = $amount;
        $this->price = $price;
    }
    
    function buy()
    {
        $this->remainingamount = $this->price - $this->amount;
            if($this->remainingamount !== 0)
                echo "<h3 name='enjoy' id='enjoy' style='color:green;'>Enjoy your " .$this->product." and your Remaining Balance is " .$this->remainingamount. " cents.</h4>"; 
        else
            echo "<h3 name='enjoy' id='enjoy' style='color:green;'>Enjoy your $this->product </h4>";
    }
}
?>


