<?php 
namespace frontend\widgets\WeatherForecast;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

final class ForecastDayCollection implements Countable, IteratorAggregate {
    
    /**
     * @var ForecastDay[] 
     */
    private array $_days = [];

    public function add(ForecastDay $day) {
        $this->_days[] = $day;
    }
    
    public function getIterator(): Traversable {
        return new ArrayIterator($this->_days);
    }

    public function count():int {
        return count($this->_days);
    }
}