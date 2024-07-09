<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240626_102945_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'old_price' => $this->decimal(10, 2),
            'image' => $this->string(),
            'description' => $this->text(),
            'information' => $this->text(),
        ]);
        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-product-category_id',
            'product'
        );

        $this->dropIndex(
            'idx-product-category_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
