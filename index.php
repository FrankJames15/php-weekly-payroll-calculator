<?php
include './class/employee.class.php';
include './functions/display_payroll_in_table.function.php';

$name = readline("\nEmployee Name: ");
$hourly_wage = floatval(readline("Hourly Wage: "));
$hours_worked = floatval(readline("Hours Worked: "));
$exemptions = intval(readline("Withholding Exemptions: "));
$marital_status = strtolower(readline("Marital Status - S(Single) M(Married): "));
$year_to_date = floatval(readline("Previous YTD Earnings: "));

$employee1 = new Employee(
    $name,
    $hourly_wage,
    $hours_worked,
    $exemptions,
    $marital_status,
    $year_to_date,
);

displaySummaryInTable(
    $employee1->get_name(),
    $employee1->get_current_earning(),
    $employee1->get_year_to_date(),
    $employee1->get_fica_tax(),
    $employee1->get_income_tax(),
    $employee1->get_check_amount()
);
