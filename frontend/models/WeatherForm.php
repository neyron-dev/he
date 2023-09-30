<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class WeatherForm extends Model
{
    
    public $city;
    
    public function rules()
    {
        return [
            [['city'], 'required'],
            [['city'], 'string'],
        ];
    }

    
    public function attributeLabels()
    {
        return [
            'city' => 'Город',
        ];
    }
}
