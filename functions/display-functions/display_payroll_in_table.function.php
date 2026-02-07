<?php
function displaySummaryInTable(
    $name,
    $currentEarning,
    $updatedYearToDate,
    $ficaTax,
    $incomeTax,
    $checkAmount

) {

    echo "\nPAYROLL REPORT\n\n";
    printf(
        "%-12s  | %19s  | %21s  | %12s  | %16s  | %13s\n",
        "Name",
        "Current Earnings",
        "Yr. to Date Earnings",
        "FICA Taxes",
        "Income Tax Wh.",
        "Check Amount"
    );
    echo str_repeat("-", 114) . "\n";
    printf(
        "%-12s  | %19s  | %21s  | %12s  | %16s  | %13s\n",
        $name,
        number_format($currentEarning, 2),
        number_format($updatedYearToDate, 2),
        number_format($ficaTax, 2),
        number_format($incomeTax, 2),
        number_format($checkAmount, 2)
    );
}
