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

<h2>Payment</h2>

  <div class="IP" style="width: 700px;">
      <form method = "post" >
    <input type="text" id="pay" name="payment" placeholder="Make Payment.." required />
    <button type="submit" id="BFP" name="button"> Pay</button>
    </form>
  </div>




<?php

error_reporting (E_ALL ^ E_NOTICE);


$bal = $_POST["bal"];
$payment = $_POST["payment"];
$credit_card = $_POST["credit_card"];
$date_of_transaction = date("Y-m-d");
date_default_timezone_set("Asia/Kuala_Lumpur");
$time_of_transaction = date("H:i:s");

      if($balance > $payment){
      $remaining_balance = $balance - $payment;
      $_SESSION['bal']= $remaining_balance;
      $status = "Successful";}
  else{
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

$date_of_transaction = date("Y-m-d H:i:s ");

?>
