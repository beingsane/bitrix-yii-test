<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mobileapp_config".
 *
 * @property string $APP_CODE
 * @property string $PLATFORM
 * @property string $PARAMS
 * @property string $DATE_CREATE
 */
class BMobileappConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mobileapp_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['APP_CODE', 'PLATFORM', 'PARAMS', 'DATE_CREATE'], 'required'],
            [['PARAMS'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['APP_CODE', 'PLATFORM'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'APP_CODE' => Yii::t('app', 'App  Code'),
            'PLATFORM' => Yii::t('app', 'Platform'),
            'PARAMS' => Yii::t('app', 'Params'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
        ];
    }

    public function getName()
    {
        return $this->APP_CODE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'APP_CODE', 'APP_CODE');
        return $list;
    }
}
