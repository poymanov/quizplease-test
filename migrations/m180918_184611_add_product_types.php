<?php

use yii\db\Migration;
use yii\db\Schema;

class m180918_184611_add_product_types extends Migration
{

    public function up()
    {
        $this->createTable('product_types', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('product_types');
    }
}
