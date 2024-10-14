<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tours".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $title
 * @property string|null $description
 * @property float|null $price
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 */
class Tour extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
        ];
    }
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['alias', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getTourPrice()
    {
        return $this->hasOne(TourPrice::class, ['tour_id' => 'id']);
    }

}
