<?php

class Employee
{

    public $name;
    public $hourly_wage;
    public $hours_worked;
    public $exemptions;
    public $marital_status;
    public $year_to_date;

    function __construct(
        $name,
        $hourly_wage,
        $hours_worked,
        $exemptions,
        $marital_status,
        $year_to_date
    ) {
        $this->name = $name;
        $this->hourly_wage = $hourly_wage;
        $this->hours_worked = $hours_worked;
        $this->exemptions = $exemptions;
        $this->marital_status = $marital_status;
        $this->year_to_date = $year_to_date;
    }
    public function get_name()
    {
        return $this->name;
    }

    public function get_current_earning()
    {
        $REGULAR_WORKING_HOURS = 40;

        $current_earning = 0.00;
        if ($this->hours_worked <= $REGULAR_WORKING_HOURS) {
            $current_earning =  $this->hourly_wage * $this->hours_worked;
            return $current_earning;
        }
        $regularPay = $REGULAR_WORKING_HOURS * $this->hourly_wage;
        $overtime = $this->hours_worked - $REGULAR_WORKING_HOURS;
        $overtimePay = $overtime * ($this->hourly_wage * 1.5);

        $current_earning = $regularPay + $overtimePay;
        return $current_earning;
    }

    function get_year_to_date()
    {
        $updated_year_to_date = $this->year_to_date + $this->get_current_earning();
        return $updated_year_to_date;
    }

    function get_fica_tax()
    {
        $SOCIAL_SECURITY_LIMIT = 90000;

        // TAX RATES
        $MEDICARE_TAX_RATE = 0.0145;
        $SS_TAX_RATE = 0.062;

        $medicare = $this->get_current_earning() * $MEDICARE_TAX_RATE;

        $ss_tax = 0.00;

        if ($this->year_to_date < $SOCIAL_SECURITY_LIMIT) {

            $remaining_limit = $SOCIAL_SECURITY_LIMIT - $this->year_to_date;
            // echo "\nremaining limit: " . $remaining_limit;

            $ss_tax = ($this->get_current_earning() <= $remaining_limit)
                ? $this->get_current_earning() * $SS_TAX_RATE
                : $remaining_limit * $SS_TAX_RATE;
        }

        $fica_tax = $ss_tax + $medicare;

        return $fica_tax;
    }

    function get_income_tax()
    {
        $EXEMPTION_DEDUCTION = 61.54;

        $total_exemp_deduc = $this->exemptions * $EXEMPTION_DEDUCTION;
        $deducted_earning = $this->get_current_earning() - $total_exemp_deduc;

        if ($this->marital_status === "s") {
            if ($deducted_earning <= 51) return 0;
            if ($deducted_earning <= 188) return 0.10 * ($deducted_earning - 51);
            if ($deducted_earning <= 606) return 13.70 + 0.15 * ($deducted_earning - 188);
            if ($deducted_earning <= 1341) return 76.40 + 0.25 * ($deducted_earning - 606);
            if ($deducted_earning <= 2922) return 260.15 + 0.28 * ($deducted_earning - 1341);
            if ($deducted_earning <= 6313) return 702.83 + 0.33 * ($deducted_earning - 2922);
            return 1821.86 + 0.35 * ($deducted_earning - 6313);
        } else { // married
            if ($deducted_earning <= 154) return 0;
            if ($deducted_earning <= 435) return 0.10 * ($deducted_earning - 154);
            if ($deducted_earning <= 1273) return 28.10 + 0.15 * ($deducted_earning - 435);
            if ($deducted_earning <= 2322) return 153.80 + 0.25 * ($deducted_earning - 1273);
            if ($deducted_earning <= 3646) return 416.05 + 0.28 * ($deducted_earning - 2322);
            if ($deducted_earning <= 6409) return 786.77 + 0.33 * ($deducted_earning - 3646);
            return 1698.56 + 0.35 * ($deducted_earning - 6409);
        }
    }

    function get_check_amount()
    {
        $tax_total = $this->get_fica_tax() + $this->get_income_tax();
        $check_amount = $this->get_current_earning() - $tax_total;
        return $check_amount;
    }
}
