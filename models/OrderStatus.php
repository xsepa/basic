<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_status".
 *
 * @property string $id
 * @property string $status_zayavok
 *
 * @property Order[] $orders
 */
class OrderStatus extends \yii\db\ActiveRecord {

    CONST ORDERSTATUS_OPEN = 1;
    CONST ORDERSTATUS_CLOSED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'order_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status_zayavok'], 'required'],
            [['status_zayavok'], 'string', 'max' => 45],
            [['status_zayavok'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'status_zayavok' => 'Status Zayavok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders() {
        return $this->hasMany(Order::className(), ['status_zayavok_id' => 'id']);
    }

}
