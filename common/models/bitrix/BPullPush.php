<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_pull_push".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $DEVICE_TYPE
 * @property string $APP_ID
 * @property string $UNIQUE_HASH
 * @property string $DEVICE_ID
 * @property string $DEVICE_NAME
 * @property string $DEVICE_TOKEN
 * @property string $DATE_CREATE
 * @property string $DATE_AUTH
 */
class BPullPush extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_pull_push';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'DEVICE_TOKEN', 'DATE_CREATE'], 'required'],
            [['USER_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_AUTH'], 'safe'],
            [['DEVICE_TYPE', 'APP_ID', 'UNIQUE_HASH', 'DEVICE_NAME'], 'string', 'max' => 50],
            [['DEVICE_ID', 'DEVICE_TOKEN'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'DEVICE_TYPE' => Yii::t('app', 'Device  Type'),
            'APP_ID' => Yii::t('app', 'App '),
            'UNIQUE_HASH' => Yii::t('app', 'Unique  Hash'),
            'DEVICE_ID' => Yii::t('app', 'Device '),
            'DEVICE_NAME' => Yii::t('app', 'Device  Name'),
            'DEVICE_TOKEN' => Yii::t('app', 'Device  Token'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_AUTH' => Yii::t('app', 'Date  Auth'),
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
