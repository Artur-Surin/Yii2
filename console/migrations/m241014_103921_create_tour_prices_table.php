<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tour_prices}}`.
 */
class m241014_103921_create_tour_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tour_prices}}', [
            'id' => $this->primaryKey(),
            'tour_id' => $this->integer()->unique()->notNull(),
            'price_adult' => $this->decimal(15, 2)->notNull(),
            'price_adult_sale' => $this->decimal(15, 2)->defaultValue(null),
            'price_children' => $this->decimal(15, 2)->notNull(),
            'price_children_sale' => $this->decimal(15, 2)->defaultValue(null),
        ]);

        // Добавляем внешний ключ
        $this->addForeignKey(
            'fk-tour-prices-tour_id',
            '{{%tour_prices}}',
            'tour_id',
            '{{%tours}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешний ключ
        $this->dropForeignKey('fk-tour-prices-tour_id', '{{%tour_prices}}');

        $this->dropTable('{{%tour_prices}}');
    }
}
