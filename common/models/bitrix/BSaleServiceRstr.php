<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_service_rstr".
 *
 * @property integer $ID
 * @property integer $SERVICE_ID
 * @property integer $SERVICE_TYPE
 * @property integer $SORT
 * @property string $CLASS_NAME
 * @property string $PARAMS
 */
class BSaleServiceRstr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_service_rstr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SERVICE_ID', 'SERVICE_TYPE', 'CLASS_NAME'], 'required'],
            [['SERVICE_ID', 'SERVICE_TYPE', 'SORT'], 'integer'],
            [['PARAMS'], 'string'],
            [['CLASS_NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SERVICE_ID' => Yii::t('app', 'Service '),
            'SERVICE_TYPE' => Yii::t('app', 'Service  Type'),
            'SORT' => Yii::t('app', 'Sort'),
            'CLASS_NAME' => Yii::t('app', 'Class  Name'),
            'PARAMS' => Yii::t('app', 'Params'),
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
