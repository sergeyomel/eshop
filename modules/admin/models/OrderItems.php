<?php

namespace app\modules\admin\models;
use Yii;

class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }
    
     public function getOrder() {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_Item', 'sum_Item'], 'required'],
            [['order_id', 'product_id', 'qty_Item'], 'integer'],
            [['price', 'sum_Item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'price' => 'Price',
            'qty_Item' => 'Qty  Item',
            'sum_Item' => 'Sum  Item',
        ];
    }
}
