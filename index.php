<?php
include './functions/calculate_current_earning.function.php';
include './functions/update_year-to-date.function.php';
include './functions/calculate_fica_tax.function.php';
include './functions/adjust_current_earning.function.php';
include './functions/calculate_income_tax.function.php';
include './functions/calculate_check_amount.function.php';

include './functions/display-functions/display_payroll_in_table.function.php';
include './functions/display-functions/display_paroll_in_clerk.function.php';

$name = readline("\nEmployee Name: ");
$hourlyWage = floatval(readline("Hourly Wage: "));
$hoursWorked = floatval(readline("Hours Worked: "));
$exemptions = intval(readline("Withholding Exemptions: "));
$maritalStatus = strtolower(readline("Marital Status - S(Single) M(Married): "));
$yearToDate = floatval(readline("Previous YTD Earnings: "));

$currentEarning = calculateCurrentEarning($hourlyWage, $hoursWorked);
$updatedYearToDate = updateYearToDate($yearToDate, $currentEarning);
$ficaTax = calculateFicaTax($yearToDate, $currentEarning);
$adjustedEarning = adjustCurrentEarning($currentEarning, $exemptions);
$incomeTax = calculateIncomeTax($adjustedEarning, $maritalStatus);
$checkAmount =  calculateCheckAmount($currentEarning, $ficaTax, $incomeTax);

displaySummaryInTable(
    $name,
    $currentEarning,
    $updatedYearToDate,
    $ficaTax,
    $incomeTax,
    $checkAmount
);

// displayPayrollInClerk(
//     $name,
//     $currentEarning,
//     $updatedYearToDate,
//     $ficaTax,
//     $incomeTax,
//     $checkAmount
// );
