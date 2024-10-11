<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tour extends ActiveRecord
{
    public static function tableName()
    {
        return 'tours'; // Убедитесь, что здесь указано имя вашей таблицы
    }

    public function rules()
    {
        return [
            [['title', 'alias', 'description', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['alias', 'title'], 'string', 'max' => 255],
        ];
    }
}
