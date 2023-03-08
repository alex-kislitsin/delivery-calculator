<?php

use frontend\models\GetCostForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var ActiveForm $form */
/** @var GetCostForm $model */

?>
<div class="page-calculate">
    <?php $form = ActiveForm::begin([
        'id' => 'form-delivery-calculate-js',
        'action' => ['get-cost'],
    ]); ?>
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'distance')
                ->textInput(['type' => 'number', 'min' => 1, 'step' => 1]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'cost')->textInput(['readonly' => true]) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Рассчитать стоимость', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>