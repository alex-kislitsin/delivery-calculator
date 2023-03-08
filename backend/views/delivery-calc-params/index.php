<?php

use backend\models\search\DeliveryCalcParamsSearch;
use common\models\DeliveryCalcParams;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/** @var View $this */
/** @var DeliveryCalcParamsSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */

$this->title = 'Параметры рассчета доставки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-calc-params-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Создать параметр', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dist_from',
            'dist_to',
            'price',
            [
                'attribute' => 'is_active',
                'filter' => [1 => 'Активен', 0 => 'Неактивен'],
                'value' => function (DeliveryCalcParams $model) {
                    return $model->is_active ? 'Активен' : 'Неактивен';
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, DeliveryCalcParams $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
