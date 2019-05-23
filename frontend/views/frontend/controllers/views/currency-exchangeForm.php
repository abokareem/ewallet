<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UsersWallets */
/* @var $form ActiveForm */
?>
<div class="frontend-controllers-views-currency-exchangeForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'users_id') ?>
        <?= $form->field($model, 'currency_id') ?>
        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- frontend-controllers-views-currency-exchangeForm -->
