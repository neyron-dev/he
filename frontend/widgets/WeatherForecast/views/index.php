<?php

/**
 * @var ForecastDay $day
 */
?>
<table style="width: 100%;">
    <tr>
        <?php foreach ($forecastCollection as $key => $day): ?>
            <th>
                <?=$day->getLabel();?>
            </th>
        <?php endforeach;?>
    </tr>

    <tr>
        <?php foreach ($forecastCollection as $key => $day):?> 
           
            <td>
                <?php if($key == 0) :?>
                    Ночь: <?=$day->getForecast()->getNightTemperature();?> <br>
                    Утро: <?=$day->getForecast()->getMorningTemperature();?> <br>
                    День: <?=$day->getForecast()->getAfternoonTemperature();?> <br>
                    Вечер: <?=$day->getForecast()->getEveningTemperature();?> <br>
                   
                <?php else:?>
                    Среднесуточная: <?=$day->getForecast()->getDailyTemperature();?>
                <?php endif;?>
                
            </td>
    

        <?php endforeach;?>
    </tr>
           
</table>
       
