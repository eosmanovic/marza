<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m200330_172739_add_price_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'sum_price_without_pdv', $this->string());
        $this->addColumn('{{%product}}', 'sum_price_with_padv', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'sum_price_without_pdv');
        $this->dropColumn('{{%product}}', 'sum_price_with_padv');
    }
}
