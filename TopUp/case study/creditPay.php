<?php

if ($_POST['pay']) {
    $amount = $_POST['amount'];

    function cashback($amount)
    {
        $amount = $amount + 0.50;

        return $amount;
    }
    $amount = cashback($amount);

    echo $amount;
}
