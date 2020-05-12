<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type}}`.
 */
class m200329_190847_create_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }
}
