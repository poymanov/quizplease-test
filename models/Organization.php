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
            [['title', 'address', 'inn', 'kpp', 'phone'], 'string', 'max' => 255],
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
}
