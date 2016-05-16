<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_bot_token".
 *
 * @property integer $ID
 * @property string $TOKEN
 * @property string $DATE_CREATE
 * @property string $DATE_EXPIRE
 * @property integer $BOT_ID
 * @property string $DIALOG_ID
 */
class BImBotToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_bot_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_CREATE', 'DIALOG_ID'], 'required'],
            [['DATE_CREATE', 'DATE_EXPIRE'], 'safe'],
            [['BOT_ID'], 'integer'],
            [['TOKEN'], 'string', 'max' => 32],
            [['DIALOG_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TOKEN' => Yii::t('app', 'Token'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_EXPIRE' => Yii::t('app', 'Date  Expire'),
            'BOT_ID' => Yii::t('app', 'Bot '),
            'DIALOG_ID' => Yii::t('app', 'Dialog '),
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
