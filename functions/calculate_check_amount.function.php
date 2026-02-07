<?php
function calculateCheckAmount($currentEarning, $ficaTax, $incomeTax)
{
    $taxTotal = $ficaTax + $incomeTax;
    $checkAmount = $currentEarning - $taxTotal;
    return $checkAmount;
}
