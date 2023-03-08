<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DeliveryCalcParams $model */

$this->title = 'Создать параметр';
$this->params['breadcrumbs'][] = ['label' => 'Параметры рассчета доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-calc-params-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
