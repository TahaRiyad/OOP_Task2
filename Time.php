<?php

class Time {
    private $hour;
    private $minute;
    private $second;

    public function __construct($hour, $minute, $second) {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function getNextSecond() {
        $this->second++;
        if ($this->second == 60) {
            $this->second = 0;
            $this->minute++;
            if ($this->minute == 60) {
                $this->minute = 0;
                $this->hour++;
                if ($this->hour == 24) {
                    $this->hour = 0;
                }
            }
        }
        return $this;
    }

    public function getPreviousSecond() {
        $this->second--;
        if ($this->second == -1) {
            $this->second = 59;
            $this->minute--;
            if ($this->minute == -1) {
                $this->minute = 59;
                $this->hour--;
                if ($this->hour == -1) {
                    $this->hour = 23;
                }
            }
        }
        return $this;
    }

    public function __toString() {
        return sprintf("%02d:%02d:%02d", $this->hour, $this->minute, $this->second);
    }
}


$time = new Time(10, 30, 45);
echo "Initial Time: " . $time . "<br>";

$time->getNextSecond()->getNextSecond();
echo "Time after advancing by two seconds: " . $time . "<br>";

$time->getPreviousSecond();
echo "Time after rewinding by one second: " . $time ."<br>";
