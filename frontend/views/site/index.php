<?php

/** @var yii\web\View $this */

use frontend\widgets\WeatherForecast\Helpers\OpenApiRequestCoordinates;
use frontend\widgets\WeatherForecast\Providers\OpenWeatherApiProvider;
use frontend\widgets\WeatherForecast\WeatherForecast;

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => 'weather-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

    <?= $form->field($model, 'city') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>


<?= WeatherForecast::widget([
    "weatherProvider" => new OpenWeatherApiProvider(),
    "city" => $city
]); ?>