<?php
$remaining = 0;
$product = '';
include 'Vending.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(!empty($_POST['submit']))
{
    if(!isset($_POST['snack']))
        echo "<h3 name='snackerror' id='snackerror' style='color:red;'>Please choose any item</h3>";
    else
    {
        $cash = $_POST['cash'];
        $product = $_POST['snack'];
        switch($product)
        {
            case "Chocolate":
                
                if($cash < 175)
                
                    echo "<h3 name='casherror' id='casherror' style='color:red;'>Not enough money to buy Chocolate</h3>";
        
                else
                {
                    $chocolate = new Vending('Chocolate' , $cash, 125);
                    $chocolate->buy();
                }
                
                break;
                
            case "Pop":
                if($cash < 150)
                    echo "<h3 name='casherror' id='casherror' style='color:red;'>Not enough money to buy Pop</h3>";
                else
                {
                    $chocolate = new Vending('Pop', $cash, 150);
                    $chocolate->buy();
                }
                break;
                
            case "Chips":
                if($cash < 125)
                    
                    echo "<h3 name='casherror' id='casherror' style='color:red;'>Not enough money to buy Chips</h3>";
                
                else
                {
                    $chocolate = new Vending('Chips', $cash, 175);
                    $chocolate->buy();
                }
                break;
                
        }
    }
}
}
?>

<html>
<body>
    <h4>Vending Machine</h4>
    <form action = 'Part1.php' method = 'post'> 
    <label>Total Money (in Cents):</label>
    <input type = "text" name="cash" id="cash" value=0 onclick="err();" /><br/><br/>  
    <label>Select an item:</label><br>
    <input type = "radio" name = "snack" id="chocolate" value="Chocolate" onClick="radioClicked();">Chocolate Bar $1.75<br>  
    <input type = "radio" name = "snack" id="pop" value="Pop" onClick="radioClicked();">Pop $1.50<br>   
    <input type = "radio" name = "snack" id="chocolate" value="Chips" onClick="radioClicked();">Chips $1.25<br> 
      <br/> 
        Add Money:
        <input type="button" name = 'one' value='1 $ (100 cents)' id ='one' onClick="buttonClick(100);">
        <input type="button" name = 'five' value ='5 cents' id ='five' onClick="buttonClick(5);">
        <input type="button" name = 'ten' value = '10 cents' id ='ten' onClick="buttonClick(10);">
        <input type="button" name = 'twentyfive' value = '25 cents' id ='twentyfive' onClick="buttonClick(25);">
    <br/><br/>
    <input type = "submit" name="submit" value = "Pay">     
    <button name="cancel" id='cancel' onclick="this.form.reset();">Cancel</button>
    </form>
    <script>
        function radioClicked() {
            if(document.getElementById('snackerror')) {
                document.getElementById('snackerror').innerHTML = '';
            }
            if(document.getElementById('casherror')) {
                document.getElementById('casherror').innerHTML = '';
            }
             if(document.getElementById('enjoy')) {
                document.getElementById('enjoy').innerHTML = '';
            }
        }
         function buttonClick(value) {
            if(document.getElementById('snackerror')) {
                document.getElementById('snackerror').innerHTML = '';
            }
            if(document.getElementById('casherror')) {
                document.getElementById('casherror').innerHTML = '';
            }
            if(document.getElementById('enjoy')) {
                document.getElementById('enjoy').innerHTML = '';
            }
            document.getElementById('cash').value = parseInt(document.getElementById('cash').value) + value;
        }
         function err()
        {
            alert("Use Money Buttons to add Money.");
        }
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
    </body>
</html>