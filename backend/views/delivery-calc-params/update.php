<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DeliveryCalcParams $model */

$this->title = 'Обновить параметр: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Параметры рассчета доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="delivery-calc-params-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
