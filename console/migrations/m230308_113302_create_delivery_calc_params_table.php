<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_calc_params}}`.
 */
class m230308_113302_create_delivery_calc_params_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%delivery_calc_params}}', [
            'id' => $this->primaryKey(),
            'dist_from' => $this->integer()->notNull()->comment('Дистанция от'),
            'dist_to' => $this->integer()->comment('Дистанция до'),
            'price' => $this->decimal(12,2)->notNull()->comment('Стоимость одного километра'),
            'is_active' => $this->boolean()->defaultValue(0)->comment('Активен')
        ]);

        $this->batchInsert('{{%delivery_calc_params}}',['dist_from', 'dist_to', 'price', 'is_active'], [
            [0, 100, 100, 1],
            [100, 300, 80, 1],
            [300, null, 70, 1],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%delivery_calc_params}}');
    }
}
