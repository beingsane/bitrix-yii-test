<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_change".
 *
 * @property integer $ID
 * @property integer $ORDER_ID
 * @property string $TYPE
 * @property string $DATA
 * @property string $DATE_CREATE
 * @property string $DATE_MODIFY
 * @property integer $USER_ID
 * @property string $ENTITY
 * @property integer $ENTITY_ID
 */
class BSaleOrderChange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_change';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'TYPE', 'DATE_CREATE', 'DATE_MODIFY', 'USER_ID'], 'required'],
            [['ORDER_ID', 'USER_ID', 'ENTITY_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_MODIFY'], 'safe'],
            [['TYPE'], 'string', 'max' => 255],
            [['DATA'], 'string', 'max' => 512],
            [['ENTITY'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'TYPE' => Yii::t('app', 'Type'),
            'DATA' => Yii::t('app', 'Data'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'USER_ID' => Yii::t('app', 'User '),
            'ENTITY' => Yii::t('app', 'Entity'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
