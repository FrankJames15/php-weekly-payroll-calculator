<?php


function displayPayrollInClerk(
    $name,
    $currentEarning,
    $updatedYearToDate,
    $ficaTax,
    $incomeTax,
    $checkAmount
) {
    echo "\n-------------- PAYROLL SUMMARY --------------\n";
    echo "=============================================\n";
    echo str_pad("Name: ", 35, '.', STR_PAD_RIGHT) . $name . "\n";
    echo str_pad("Current Earning: ", 35, '.', STR_PAD_RIGHT) . "₱" . number_format($currentEarning, 2) . "\n";
    echo str_pad("Yr. to Date Earnings: ", 35, '.', STR_PAD_RIGHT) . "₱" . number_format($updatedYearToDate, 2) . "\n";
    echo str_pad("FICA Taxes: ", 35, '.', STR_PAD_RIGHT) . "₱" . number_format($ficaTax, 2) . "\n";
    echo str_pad("Income Tax Wh.: ", 35, '.', STR_PAD_RIGHT) . "₱" . number_format($incomeTax, 2) . "\n";
    echo "=============================================\n";
    echo str_pad("Check Amount: ", 35, '.', STR_PAD_RIGHT) . "₱" . number_format($checkAmount, 2) . "\n\n";
}
