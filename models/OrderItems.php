<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class OrderItems extends ActiveRecord {
    
    public static function tableName() {
        return 'order_items';
    }

    public function getOrder() {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
    
    public function rules() {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_Item', 'sum_Item'], 'required'],
            [['order_id', 'product_id', 'qty_Item'], 'integer'],
            [['price', 'sum_Item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}
