<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WeatherData
 *
 * @author lenovo
 */
class WeatherData implements SplSubject{
    private $temperature;
    private $humidity;
    private $pressure;
    
    public function __construct($temperature=0,$humidity=0,$pressure=0) {
        $this->temperature=$temperature;
        $this->humidity=$humidity;
        $this->pressure=$pressure;
        $this->observers =new SplObjectStorage();
    }
    public function getTemperature() {
        return $this->temperature;
    }

    public function getHumidity() {
        return $this->humidity;
    }

    public function getPressure() {
        return $this->pressure;
    }

    public function setTemperature($temperature): void {
        $this->temperature = $temperature;
        $this->notify();
    }

    public function setHumidity($humidity): void {
        $this->humidity = $humidity;
        $this->notify();
    }

    public function setPressure($pressure): void {
        $this->pressure = $pressure;
        $this->notify();
    }
    
    public function __toString() {
        return "Temperature:".$this->temperature."Humidity:"
                .$this->humidity."Pressure:".$this->pressure;
    }

    public function attach(\SplObserver $observer): void {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void {
        $this->observers->detach($observer);
    }

    public function notify(): void {
        foreach($this->observers as $o){
            $o->update($this);
        }
    }

}
