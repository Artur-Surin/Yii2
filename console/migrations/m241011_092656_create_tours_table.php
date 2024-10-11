<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tours}}`.
 */
class m241011_092656_create_tours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tours', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(255),
            'title' => $this->string(255),
            'description' => $this->text(),
            'price' => $this->decimal(10, 2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('tours');
    }
}

