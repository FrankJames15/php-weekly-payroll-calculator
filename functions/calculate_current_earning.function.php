<?php
// Current Earnings: 
// hourlyWage * hourstWorked (with time-and-a-half after 40 hours)
function calculateCurrentEarning($hourlyWage = 0.00, $hoursWorked = 0)
{
    $REGULAR_WORKING_HOURS = 40;

    $currentEarning = 0.00;
    if ($hoursWorked <= $REGULAR_WORKING_HOURS) {
        $currentEarning =  $hourlyWage * $hoursWorked;
        return $currentEarning;
    }
    $regularPay = $REGULAR_WORKING_HOURS * $hourlyWage;
    $overtime = $hoursWorked - $REGULAR_WORKING_HOURS;
    $overtimePay = $overtime * ($hourlyWage * 1.5);

    $currentEarning = $regularPay + $overtimePay;
    return $currentEarning;
}
