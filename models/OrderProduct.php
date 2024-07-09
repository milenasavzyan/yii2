<?php

namespace app\models;

use yii\db\ActiveRecord;

class OrderProduct extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_product';
    }

    public function rules()
    {
        return[
            [['order_id', 'product_id', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['total'], 'number'],
        ];
    }
    public function saveOrderProduct($products, $order_id)
    {
        foreach ($products as $id => $product) {
            $this->id = null;
            $this->isNewRecord = true;
            $this->order_id = $order_id;
            $this->product_id = $id;
            $this->qty = $product['qty'];
            $this->total = $product['qty'] * $product['price'];

            if (!$this->save()) {
                return false;
            }
        }
        return true;

    }


    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'order_id']);
    }


}