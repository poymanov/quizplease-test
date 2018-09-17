<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180917_192749_add_users_profiles_tables
 */
class m180917_192749_add_users_profiles_tables extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
        ]);

        $this->createTable('profile', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING
        ]);

        $this->addForeignKey('fk_user_profile_user_id', 'profile', 'user_id',
                           'user', 'id', 'SET NULL');
    }

    public function down()
    {
        $this->dropForeignKey('fk_user_profile_user_id', 'profile');
        $this->dropTable('profile');
        $this->dropTable('user');
    }
}
