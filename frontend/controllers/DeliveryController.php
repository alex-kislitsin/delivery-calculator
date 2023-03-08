<?php

namespace frontend\controllers;

use common\services\delivery\Calculator;
use frontend\models\GetCostForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Delivery controller
 */
class DeliveryController extends Controller
{
    /**
     * @return string
     */
    public function actionPageCalculate()
    {
        $model = new GetCostForm();
        return $this->render('page-calculate',[
            'model' => $model
        ]);
    }

    /**
     * @return float|string
     */
    public function actionGetCost()
    {
        $model = new GetCostForm();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load(Yii::$app->request->post())) {
            try {
                return (new Calculator())->getCost($model->distance);
            }catch (\Exception $exception) {}
        }
        return 'Ошибка, обратитесь с тех.поддержку.';
    }
}
