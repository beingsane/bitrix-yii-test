<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_delivery_srv".
 *
 * @property integer $ID
 * @property string $CODE
 * @property integer $PARENT_ID
 * @property string $NAME
 * @property string $ACTIVE
 * @property string $DESCRIPTION
 * @property integer $SORT
 * @property integer $LOGOTIP
 * @property string $CONFIG
 * @property string $CLASS_NAME
 * @property string $CURRENCY
 * @property string $TRACKING_PARAMS
 * @property string $ALLOW_EDIT_SHIPMENT
 */
class BSaleDeliverySrv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_delivery_srv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'SORT', 'LOGOTIP'], 'integer'],
            [['NAME', 'ACTIVE', 'SORT', 'CLASS_NAME', 'CURRENCY'], 'required'],
            [['DESCRIPTION', 'CONFIG'], 'string'],
            [['CODE'], 'string', 'max' => 50],
            [['NAME', 'CLASS_NAME', 'TRACKING_PARAMS'], 'string', 'max' => 255],
            [['ACTIVE', 'ALLOW_EDIT_SHIPMENT'], 'string', 'max' => 1],
            [['CURRENCY'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
            'LOGOTIP' => Yii::t('app', 'Logotip'),
            'CONFIG' => Yii::t('app', 'Config'),
            'CLASS_NAME' => Yii::t('app', 'Class  Name'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'TRACKING_PARAMS' => Yii::t('app', 'Tracking  Params'),
            'ALLOW_EDIT_SHIPMENT' => Yii::t('app', 'Allow  Edit  Shipment'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
