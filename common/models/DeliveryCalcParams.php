<?php

namespace common\models;

use common\models\query\DeliveryCalcParamsQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "delivery_calc_params".
 *
 * @property int $id
 * @property int $dist_from Дистанция от
 * @property int|null $dist_to Дистанция до
 * @property float $price Стоимость одного километра
 * @property int|null $is_active Активен
 */
class DeliveryCalcParams extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_calc_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dist_from', 'price'], 'required'],
            [['dist_from', 'dist_to', 'is_active'], 'integer'],
            [['dist_from', 'dist_to'], 'unique'],
            [['price'], 'number'],
            [['dist_from'], 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number'],
            [['price'], 'compare', 'compareValue' => 0, 'operator' => '>', 'type' => 'number'],
            ['dist_from', function () {
                if (!$this->dist_to && $this->is_active &&
                    self::find()->where(['dist_to' => null, 'is_active' => 1])->exists()) {
                    $this->addError('dist_to', 'Активный параметр без ограничения уже существует.');
                }
                if ($this->dist_from === 0 && $this->is_active &&
                    self::find()->where(['dist_from' => 0, 'is_active' => 1])->exists()) {
                    $this->addError('dist_to', 'Активный параметр начальной точки отсчета расстояния уже существует.');
                }
            }]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dist_from' => 'Расстояние от',
            'dist_to' => 'Расстояние до',
            'price' => 'Стоимость одного километра',
            'is_active' => 'Активен',
        ];
    }

    /**
     * @return DeliveryCalcParamsQuery|ActiveQuery
     */
    public static function find()
    {
        return new DeliveryCalcParamsQuery(get_called_class());
    }
}
