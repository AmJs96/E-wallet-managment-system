
<?php session_start();

//**Kawther Shamsu alam 1725298{
 class wallet{

  public $balance=0;
  public $payment=0;
  public $dot;
  public $remainingBal=0; //**}

  public $status;
  }
?>



<!--Shima Haidar 1725900-->
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <title>E-Wallet Management system</title>
  </head>
  <body>
    <br>
    <center><h1>E-Wallet Management system</h1></center>
    <br>
    <h2>Topup Methods</h2>
    <br>
  <!-- **SAMAE ARMEEROH 1722098{ -->
  <div class="IP" >
    <table cellspacing='10' cellpadding ='0'>
    <td>
    <h6>Online Banking</h6>
    <form method = "post">
    <input type="text" id="bal" name="bal" placeholder="Input topup amount.."required />
    <button type="submit" id="OB" name="button"> TopUp</button>
   </form>
     </td>
       </table>
     </div>

     <!-- **SAMAE ARMEEROH 1722098{ -->
  <div class="IP" style="width: 700px;">
    <table cellspacing='10' cellpadding ='0'>
    <td><h6>Credit Card</h6>
      <form method = "post" >
      <input type="hidden"  name="credit_card" value="credit_card"/>
      <input type="text" style="width: 90%;" id="bal" name="credit_card" placeholder="Input topup amount.." required />
      <button type="submit" id="CC" style="width: 200px;" name="button">TopUp via Credit Card</button>
    </form>
  </td>
    </table>
  </div>
<br>
<br>

<!--Shima Haidar 1725900-->
<h2>Payment</h2>

  <div class="IP" style="width: 700px;">
      <form method = "post" >
    <input type="text" id="pay" name="payment" placeholder="Make Payment.." required />
    <button type="submit" id="BFP" name="button"> Pay</button>
    </form>
  </div>




<?php
//**Shima Haidar 1725900{
error_reporting (E_ALL ^ E_NOTICE);


$bal = $_POST["bal"];
$payment = $_POST["payment"];
$credit_card = $_POST["credit_card"];
$date_of_transaction = date("Y-m-d");//** }

date_default_timezone_set("Asia/Kuala_Lumpur"); //Shima-1725900
$time_of_transaction = date("H:i:s"); //Shima-1725900

//SAMAE ARMEEROH 1722098{
if(!isset($_SESSION['bal']))
  {
  $_SESSION['bal'] = 0;
  }



  if(isset($credit_card)){
    $_SESSION['bal']= $_SESSION['bal'] + $credit_card + 0.5;
    $balance = $_SESSION['bal'];
    echo "<p style='color:red;font-size:25px' font-style:bold>Message:</p>";
    echo "<p style='color:blue;font-size:20px' font-style:bold>You have recieved RM 0.50 cash back.</p>";// }
  }else{

     $_SESSION['bal']= $_SESSION['bal'] + $bal;
     $balance = $_SESSION['bal'];

  }//** }


  //**Shima Haidar 1725900{
  if($balance >= $payment){
      if($balance == 0){
        $status = "Null";
      }
      else{
      $remaining_balance = $balance - $payment;
      $_SESSION['bal']= $remaining_balance;
      $status = "Successful";}
  }else{
    $payment = 0;
    $remaining_balance = $balance;
    $status = "Unsuccessful";

  echo "<p style='color:red;font-size:20px' font-style:bold>Insufficient balance to make payment. </p>";
  }


date_default_timezone_set("Asia/Kuala_Lumpur");

$date_of_transaction = date("H:i:s");
$start = '12:00:00';
$end = '13:00:00';

if($date_of_transaction >= $start && $date_of_transaction <= $end) {

  $remaining_balance = (($balance - $payment) + ( $payment * 0.1));

  echo "<p style='color:green;font-size:20px' font-style:bold>You have recieved a discount of 10% for off peak hours’usage.</p>";

} else {

  $remaining_balance = $balance - $payment;

}

$date_of_transaction = date("Y-m-d H:i:s "); //##}


//**Kawther Shamsu alam 1725298{
//object
$wallet_transac = new wallet();
$wallet_transac->balance = $balance;
$wallet_transac->payment = $payment;
$wallet_transac->dot = $date_of_transaction;
$wallet_transac->remainingBal = $remaining_balance;
$wallet_transac->status = $status;


//array
$_SESSION['transactions'][] = array();
if (!isset($_SESSION['transactions'])) {
  $_SESSION['transactions'] = array();

}
array_push($_SESSION['transactions'], $wallet_transac);




//loop
foreach ($_SESSION['transactions'] as $item) {



$_balance = $item->balance;
$_payment = $item->payment;
$_dot = $item->dot;
$_remBal = $item->remainingBal;



}
echo "<div  id= 'AB'";
echo "<label> Available Balance:RM $_remBal </label>";
echo"</div>";
echo "</table>";
                  //**}
?>
<!-- Kawther Shamsu alam 1725298 { -->
<!DOCTYPE html>
<html>
<body>

<h2 style="font-size:40px;">Monthly Transaction</h2>

 <?php
echo "<br>";
echo "<table class='MT' table border='5' width='1000' cellspacing='10' cellpadding ='0'>";
echo "<tr bgcolor =' #e2703a'>";
echo "<th><center>Top-Up Amount</center></th>";
echo "<th><center>Payment</center></th>";
echo "<th><center>Date of transaction</center></th>";
echo "<th><center>Payment Status<center></th>";


echo "</tr>";

  foreach ($_SESSION['transactions'] as $item) {
    if(empty($item)){
          continue;
    }

$_balance = $item->balance;
$_payment = $item->payment;
$_dot = $item->dot;
$_status = $item->status;


echo " <td><center>RM$_balance</center></td> ";
echo " <td><center>RM$_payment</center></td> ";
echo " <td><center>$_dot</center></td> ";
echo " <td><center>$_status</center></td> ";

echo "</tr>";
  }

echo "<div  id= 'MTBL'";
echo "<label> Total Balance Left: RM $_remBal </label>";
echo"</div>";
echo "<br>";

echo "</table>";
echo "<br>";

?>

</div>
</body>
</html>
