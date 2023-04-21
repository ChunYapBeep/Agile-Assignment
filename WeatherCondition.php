
<?php

require_once 'WeatherData.php';


class WeatherCondition implements SplObserver{
    private $temp;
    private $humidity;
    
    public function __construct(WeatherData $w) {
        $this->temp = $w->getTemperature();
        $this->humidity = $w->getHumidity();
    }
    
    public function update(\SplSubject $subject) {
       $this->temp = $subject->getTemperature();
       $this->humidity =$subject->getHumidity();
       $this->display();
    }
    
    public function display(){
        $myMsg = " <h3> Current Condition </h3>";
        $myMsg .= "<br/> Temperature:". $this->temp." &#8451;";
        $myMsg .= "<br/> Humidity:".$this->humidity. "%";
        echo $myMsg;
    }
}
// put your code here
?>
