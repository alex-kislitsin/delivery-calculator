<?php

namespace frontend\models;

use yii\base\Model;

/**
 * GetCostForm form
 */
class GetCostForm extends Model
{
    public $distance;
    public $cost;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['distance', 'integer'],
            ['distance', 'required'],
            ['cost', 'safe'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function attributeLabels(): array
    {
        return [
            'distance' => 'Расстояние',
            'cost' => 'Стоимость',
        ];
    }
}
