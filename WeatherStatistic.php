<?php
require_once 'WeatherData.php';

class WeatherStatistic implements SplObserver {

    private $average;
    private $minTemp;
    private $maxTemp;

    public function __construct(WeatherData $w) {
        $this->average = $w->getTemperature();
        $this->minTemp = PHP_FLOAT_MAX;
        $this->maxTemp = PHP_FLOAT_MIN;
    }

    public function update(\SplSubject $subject) {
        $currentTemp = $subject->getTemperature();
        if ($currentTemp < $this->minTemp) {
            $this->minTemp = $currentTemp;
        }
        if ($currentTemp > $this->maxTemp) {
            $this->maxTemp = $currentTemp;
        }
        $this->average = ($this->minTemp + $tthis->maxTemp) / 2;
        $this->display();
    }

    public function display() {
        $myMsg = " <p><h3> Weather Statistic </h3>";
        $myMsg .= "<br/> Min Temperature:" . $this->minTemp . " &#8451;";
        $myMsg .= "<br/> Max Temperature:" . $this->maxTemp . "&#8451;";
        $myMsg .= "<br/> Avg Temperature:" . $this->average . "&#8451;";
        echo $myMsg;
    }

}
