<?php

namespace common\models\query;

use common\models\DeliveryCalcParams;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\DeliveryCalcParams]].
 *
 * @see \common\models\DeliveryCalcParams
 */
class DeliveryCalcParamsQuery extends ActiveQuery
{
    public function active(): DeliveryCalcParamsQuery
    {
        return $this->andWhere(['is_active' => 1]);
    }

    public function sort(): DeliveryCalcParamsQuery
    {
        return $this->orderBy(['dist_from' => SORT_ASC]);
    }

    /**
     * {@inheritdoc}
     * @return DeliveryCalcParams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DeliveryCalcParams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
