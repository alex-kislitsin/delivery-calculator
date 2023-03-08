<?php

use common\models\DeliveryCalcParams;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var DeliveryCalcParams $model */
/** @var ActiveForm $form */
?>

<div class="delivery-calc-params-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dist_from')->textInput(['type' => 'number','min' => 0, 'step' => 1]) ?>

    <?= $form->field($model, 'dist_to')->textInput(['type' => 'number','min' => 1, 'step' => 1])
        ->hint('Если оставить поле пустым, то стоимость будет для всех километров после "Дистанция от" по ниже указанной цене') ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'type' => 'number','min' => 1, 'step' => 0.01]) ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
