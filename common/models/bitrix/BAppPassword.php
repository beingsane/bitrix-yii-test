<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_app_password".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $APPLICATION_ID
 * @property string $PASSWORD
 * @property string $DIGEST_PASSWORD
 * @property string $DATE_CREATE
 * @property string $DATE_LOGIN
 * @property string $LAST_IP
 * @property string $COMMENT
 * @property string $SYSCOMMENT
 * @property string $CODE
 */
class BAppPassword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_app_password';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'APPLICATION_ID', 'PASSWORD', 'DIGEST_PASSWORD'], 'required'],
            [['USER_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_LOGIN'], 'safe'],
            [['APPLICATION_ID', 'PASSWORD', 'DIGEST_PASSWORD', 'LAST_IP', 'COMMENT', 'SYSCOMMENT', 'CODE'], 'string', 'max' => 255]
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
            'APPLICATION_ID' => Yii::t('app', 'Application '),
            'PASSWORD' => Yii::t('app', 'Password'),
            'DIGEST_PASSWORD' => Yii::t('app', 'Digest  Password'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_LOGIN' => Yii::t('app', 'Date  Login'),
            'LAST_IP' => Yii::t('app', 'Last  Ip'),
            'COMMENT' => Yii::t('app', 'Comment'),
            'SYSCOMMENT' => Yii::t('app', 'Syscomment'),
            'CODE' => Yii::t('app', 'Code'),
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
