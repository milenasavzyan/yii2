<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_product}}`.
 */
class m240702_101019_create_order_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_product}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'qty' => $this->integer()->notNull(),
            'total' => $this->decimal(10, 2)->notNull(),
        ]);

        $this->createIndex(
            'idx-order_product-product_id',
            'order_product',
            'product_id'
        );

        $this->addForeignKey(
            'fk-order_product-product_id',
            'order_product',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-order_product-order_id',
            'order_product',
            'order_id'
        );

        $this->addForeignKey(
            'fk-order_product-order_id',
            'order_product',
            'order_id',
            'orders',
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
            'fk-order_product-product_id',
            'order_product'
        );

        $this->dropIndex(
            'idx-order_product-product_id',
            'order_product'
        );

        $this->dropForeignKey(
            'fk-order_product-order_id',
            'order_product'
        );

        $this->dropIndex(
            'idx-order_product-order_id',
            'order_product'
        );

        $this->dropTable('{{%order_product}}');
    }
}
