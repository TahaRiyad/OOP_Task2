<?php


class Date {
    private $year;
    private $month;
    private $day;

    public function __construct($year, $month, $day) {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public function getYear() {
        return $this->year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getDay() {
        return $this->day;
    }

    public function setDate($year, $month, $day) {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public function toString() {
        return sprintf("%04d-%02d-%02d", $this->year, $this->month, $this->day);
    }
}


$date = new Date(1995, 9, 5);
echo "Date: " . $date->toString() . "<br>";

function calculateTimePeriod($startDate, $endDate) {
    
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);

    
    $interval = $startDateTime->diff($endDateTime);

    
    return $interval->format('%y years, %m months, %d days');
}


$currentDate = date('Y-m-d');

$futureDate = '2042-7-26';


$timePeriod = calculateTimePeriod($currentDate, $futureDate);


echo "Current Date: $currentDate" . "<br>";
echo "Future Date: $futureDate" . "<br>";
echo "Time Period: $timePeriod" . "<br>";

