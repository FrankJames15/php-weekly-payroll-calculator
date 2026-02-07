<?php
// FICA Taxes: sum of 6.2 percent of first 90,000 of earnings(Social Security benefits tax) 
// and 1.45% of total wages(Medicare Tax)
function calculateFicaTax($yearToDate, $currentEarning)
{
    $SOCIAL_SECURITY_LIMIT = 90000;

    // TAX RATES
    $MEDICARE_TAX_RATE = 0.0145;
    $SS_TAX_RATE = 0.062;

    $medicare = $currentEarning * $MEDICARE_TAX_RATE;

    $ssTax = 0.00;

    if ($yearToDate < $SOCIAL_SECURITY_LIMIT) {

        $remainingLimit = $SOCIAL_SECURITY_LIMIT - $yearToDate;
        // echo "\nremaining limit: " . $remainingLimit;

        $ssTax = ($currentEarning <= $remainingLimit)
            ? $currentEarning * $SS_TAX_RATE
            : $remainingLimit * $SS_TAX_RATE;
    }

    $ficaTax = $ssTax + $medicare;

    return $ficaTax;
}
