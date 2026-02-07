<?php
// Year-to-Date Earnings: previous year-to-date earnings plus current earnings
function updateYearToDate($yearToDate, $currentEarning)
{
    $updatedYearToDate = $yearToDate + $currentEarning;
    return $updatedYearToDate;
}
