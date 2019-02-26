<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loading_status".
 *
 * @property string $id
 * @property string $loading_status
 *
 * @property Loading[] $loadings
 */
class LoadingStatus extends \yii\db\ActiveRecord
{
    CONST LOADINGSTATUS_OPEN = 1;
    CONST LOADINGSTATUS_CLOSED = 2;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loading_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loading_status'], 'required'],
            [['loading_status'], 'string', 'max' => 45],
            [['loading_status'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loading_status' => 'Loading Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoadings()
    {
        return $this->hasMany(Loading::className(), ['loading_status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LoadingStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoadingStatusQuery(get_called_class());
    }
}
