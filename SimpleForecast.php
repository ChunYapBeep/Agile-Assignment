<?php
require_once 'WeatherData.php';


class SimpleForecast implements SplObserver {
    private $currentPressure;
    private $previousPressure;
    
    public function __construct(WeatherData $w){
        $this->currentPressure=$this->previousPressure=$w->getPressure();
    }
    
    public function update(SplSubject $subject){
        $this->previousPressure=$this->currentPressure;
        $this->currentPressure=$subject->getPressure();
        $this->display();
    }
    
    public function display(){
        $str = "<p><h3>Simple Forecast</h3>";
        if($this->currentPressure->$this->previousPressure){
            $str .= "Improving weather on the way!";
        }
        else if($this->currentPressure == $this->previousPressure){
            $str="More of the same";
        }else{
            $str="Watch out for cooler, rainy weather";
        }
        
        echo $str;
    }
    //put your code here
}
