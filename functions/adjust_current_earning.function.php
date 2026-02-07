<?php
/*
    Federal Income Tax Withheald: substract 61.54 
    from the current earnings for each withholding exemption 
*/
function adjustCurrentEarning($currentEarning = 0.00, $exemptions = 0)
{
    $EXEMPTION_DEDUCTION = 61.54;

    $totalExemptionDeduction = $exemptions * $EXEMPTION_DEDUCTION;

    $adjustedEarning = $currentEarning - $totalExemptionDeduction;

    return $adjustedEarning;
}
