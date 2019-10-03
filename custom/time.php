<?php

/**
 *  @begin    string A date/time string that can be accepted by the DateTime constructor.
 *  @end      string A date/time string that can be accepted by the DateTime constructor.
 *  @interval string An interval specification that can be accepted by the DateInterval constructor.
 *                   Defaults to P1D
 *
 *  @return   array Array of DateTime objects for the specified date range.
 */
function dateRange($begin, $end, $interval = null){
    $begin = new DateTime($begin);
    $end = new DateTime($end);
    // Because DatePeriod does not include the last date specified.
    $end = $end->modify('+1 day');
    $interval = new DateInterval($interval ? $interval : 'P1D');

    return iterator_to_array(new DatePeriod($begin, $interval, $end));
}

function dateFilter(array $daysOfTheWeek){
    return function ($date) use ($daysOfTheWeek) {
        return in_array($date->format('l'), $daysOfTheWeek);
    };
}

$dates = dateRange('2018-11-21', '2018-11-28');

$slots = array_filter($dates, dateFilter(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']));


foreach ($slots as $key => $value) {
	echo $value->format("l Y-m-d");
	echo "<br>";
}



die();

