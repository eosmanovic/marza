<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200329_184307_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'type' => $this->string(),
            'price' => $this->string(),
            'ruc' => $this->string(),
            'pdv' => $this->string(),
            'mp_price' => $this->string(),
            'quantity' => $this->string(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-product-user_id}}',
            '{{%product}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-product-user_id}}',
            '{{%product}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-product-user_id}}',
            '{{%product}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-product-user_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
