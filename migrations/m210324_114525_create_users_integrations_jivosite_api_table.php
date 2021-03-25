<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_integrations_jivosite_api}}`.
 */
class m210324_114525_create_users_integrations_jivosite_api_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_integrations_jivosite_api}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'js' => $this->text()
        ]);

        $this->addForeignKey(
            'fk-this-user_id',
            'users_integrations_jivosite_api',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->createIndex('user_id', 'users_integrations_jivosite_api', 'user_id', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-this-user_id',
            'users_integrations_jivosite_api'
        );
        $this->dropTable('{{%users_integrations_jivosite_api}}');
    }
}
