<?php

namespace app\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
    public function rules()
    {
        return[
          [['name', 'email', 'phone', 'address'], 'required'],
          [['email'], 'email'],
          [['created_at', 'updated_at'], 'safe'],
          [['qty'], 'integer'],
          [['total'], 'number'],
          [['status'], 'boolean'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'E-mail',
            'phone' => 'Phone number',
            'address' => 'Address',
        ];
    }
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }

}