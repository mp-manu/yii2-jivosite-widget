<?php

use yii\db\Migration;

/**
 * Class m210324_114518_add_users_data
 */
class m210324_114518_add_users_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'email' => 'admin@gmail.com'
        ]);
        $this->insert('users', [
            'email' => 'user@gmail.com'
        ]);
        $this->insert('users', [
            'email' => 'user1@gmail.com'
        ]);
        $this->insert('users', [
            'email' => 'user2@gmail.com'
        ]);
        $this->insert('users', [
            'email' => 'user3@gmail.com'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210324_114518_add_users_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210324_114518_add_users_data cannot be reverted.\n";

        return false;
    }
    */
}
