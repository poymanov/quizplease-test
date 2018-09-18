<?php

use yii\db\Schema;
use yii\db\Migration;

class m180918_183959_add_categories extends Migration
{
    public function up()
    {
        $this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
