<?php

function separate($price){
    $delimiter = 999;
    $pos = 3;

    $price_str = (string) $price;
    while($price > $delimiter){
        $price_str = substr_replace($price_str," ", - $pos,0);
        $pos += 4;
        $delimiter *= 1000;
    }

    return $price_str;
}