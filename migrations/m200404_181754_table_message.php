<?php

use yii\db\Migration;

/**
 * Class m200404_181754_table_message
 */
class m200404_181754_table_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'message' => $this->text()->notNull()
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('messages');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200404_181754_table_message cannot be reverted.\n";

        return false;
    }
    */
}
