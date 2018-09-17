<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $inn
 * @property string $kpp
 * @property string $phone
 * @property integer $contact_person_id
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'address', 'inn', 'kpp', 'phone'], 'required'],
            ['contact_person_id', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'address' => 'Address',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'phone' => 'Phone',
        ];
    }

    public function getContactPerson()
    {
        return $this->hasOne(Person::class, ['id' => 'contact_person_id']);
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $contactPerson = $this->contactPerson;
        $contactPerson->delete();
    }

    public function saveWithPerson(Person $person) {
        if (!$person->save()) {
            return false;
        }

        $this->contact_person_id = $person->id;
        return $this->save();
    }
}
