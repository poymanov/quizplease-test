<?php

use yii\db\Migration;
use yii\db\Schema;

class m180917_173632_add_organizations extends Migration
{
    public function up()
    {
        $this->createTable('organizations', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'address' => Schema::TYPE_STRING,
            'inn' => Schema::TYPE_STRING,
            'kpp' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING
        ]);
    }

    public function down()
    {
        $this->dropTable('organizations');
    }
}
