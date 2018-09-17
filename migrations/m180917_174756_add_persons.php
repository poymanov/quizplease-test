<?php

use yii\db\Migration;
use yii\db\Schema;

class m180917_174756_add_persons extends Migration
{
    public function up()
    {
        $this->createTable('persons', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'surname' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
        ]);

        $this->addColumn('organizations', 'contact_person_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('fk_organizations_persons_contact_person_id',
                             'organizations',
                             'contact_person_id' ,
                             'persons',
                             'id',
                             'SET NULL');
    }

    public function down()
    {
        $this->dropForeignKey('fk_organizations_persons_contact_person_id', 'organizations');
        $this->dropColumn('organizations', 'contact_person_id');
        $this->dropTable('persons');
    }
}
