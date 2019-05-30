<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\ExchangeRates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exchange-rates-form">
<?php //var_dump(ArrayHelper::map(common\models\Currency::findOne(2), 'id', 'block_change')) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id')->textInput(); ?>

    <?= $form->field($model, 'rate')->textInput(); ?>

    <?= $form->field($model->currency, 'name')->textInput(['readonly' => 'readonly'])->label('Currency'); ?>

      <!-- $form->field($model->currency, 'block_change')->radioList([ -->
    <?= $form->field($modelCurrency, 'block_change')/*->textInput();*/
    ->checkBox(['checked' => true]
    	// [	'disabled' => ArrayHelper::map(common\models\Currency::find($model->id)->asArray(true), 'id', 'block_change')]
  ); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
