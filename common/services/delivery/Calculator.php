<?php

namespace common\services\delivery;

use common\models\DeliveryCalcParams;
use yii\web\NotFoundHttpException;

/**
 * Класс занимается рассчетом стоимости доставки
 *
 * Class Calculator
 *
 * @package common\services\delivery
 */
class Calculator
{
    /**
     * метод рассчитывает доставку в зависимости от указанного расстояния
     *
     * @param int|null $distance
     * @return float
     * @throws NotFoundHttpException
     */
    public function getCost(int $distance = null) :float
    {
        $cost = 0;

        if ($distance) {
            if (!$params = DeliveryCalcParams::find()->active()->sort()->all()) {
                throw new NotFoundHttpException('Not found DeliveryCalcParams.');
            }
            foreach ($params as $param) {
                if ($param->dist_from !== null && $param->dist_to === null) {
                    $cost += $distance * $param->price;
                    break;
                }
                if ($param->dist_from !== null && $param->dist_to !== null) {
                    $diff = $param->dist_to - $param->dist_from;
                    if ($distance < $diff) {
                        $cost += $distance * $param->price;
                        break;
                    }
                    $distance -= $diff;
                    $cost += $diff * $param->price;
                }
            }
        }

        return $cost;
    }
}