<?php

function sum_money($cart)
{
    $sum = 0;
    foreach ($cart as $key => $value) {
        $sum +=($value['soluong'] * $value['gia']) ;
    }
    return $sum;
}
