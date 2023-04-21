<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'WeatherStatistic.php';
require_once 'WeatherData.php';
require_once 'WeatherCondition.php';
require_once 'SimpleForecast.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $w=new WeatherData(29.7,70.0,25.5);
          echo "Initial weather Reading from weather station <br/>";
          echo "Temperature: " . $w->getTemperature(). "&#8451;<br/>";
          echo "Humidity: " . $w->getHumidity(). "%<br/>";
          echo "Pressure: " . $w->getPressure(). "lbs<br/>";
          
          $c = new WeatherCondition($w);
          $w->attach($c);
          
          $s=new WeatherStatistic($w);
          $w->attach($s);
          
         $p= new SimpleForecast($w);
         $w->attach($p);
          
          $w->setTemperature(40.8);
           $w->setTemperature(30.5);
            $w->setTemperature(35.5);
            $w->setPressure(25.7);
            $w->setPressure(20.5);
            $w->setPressure(33.3);
        ?>
    </body>
</html>
