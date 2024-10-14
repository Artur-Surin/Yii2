<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tour_prices".
 *
 * @property int $id
 * @property int $tour_id
 * @property float $price_adult
 * @property float|null $price_adult_sale
 * @property float $price_children
 * @property float|null $price_children_sale
 *
 * @property Tour $tour
 */
class TourPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tour_id', 'price_adult', 'price_children'], 'required'],
            [['tour_id'], 'integer'],
            [['price_adult', 'price_adult_sale', 'price_children', 'price_children_sale'], 'number'],
            [['tour_id'], 'unique'],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tour::class, 'targetAttribute' => ['tour_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_id' => 'Tour ID',
            'price_adult' => 'Price Adult',
            'price_adult_sale' => 'Price Adult Sale',
            'price_children' => 'Price Children',
            'price_children_sale' => 'Price Children Sale',
        ];
    }

    /**
     * Gets query for [[Tour]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tour::class, ['id' => 'tour_id']);
    }
}
