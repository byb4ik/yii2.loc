<?php

use yii\db\Migration;

/**
 * Class m200404_181807_table_users
 */
class m200404_181807_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string(20)->notNull()->unique(),
                'password' => $this->string(50)->notNull(),
                'mail' => $this->string(30)->notNull()->unique(),
                'access' => $this->integer()->defaultValue(0)
            ]
        );

        $this->insert('users',
            [
                'username' => 'admin',
                'password' => 'admin',
                'mail' => 'admin@admin.com',
                'access' => '1'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200404_181807_table_users cannot be reverted.\n";

        return false;
    }
    */
}
