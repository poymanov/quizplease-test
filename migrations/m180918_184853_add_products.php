<?php

use yii\db\Migration;
use yii\db\Schema;

class m180918_184853_add_products extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'type_id' => Schema::TYPE_INTEGER,
            'category_id' => Schema::TYPE_INTEGER,
        ]);

        $this->addForeignKey('fk_products_types_type_id', 'products', 'type_id', 'product_types', 'id', 'SET NULL');
        $this->addForeignKey('fk_products_categories_category', 'products', 'category_id', 'categories', 'id', 'SET NULL');
    }

    public function down()
    {
        $this->dropForeignKey('fk_products_types_type_id', 'products');
        $this->dropForeignKey('fk_products_categories_category', 'products');
        $this->dropTable('products');
    }
}
