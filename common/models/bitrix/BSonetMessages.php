<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_messages".
 *
 * @property integer $ID
 * @property integer $FROM_USER_ID
 * @property integer $TO_USER_ID
 * @property string $TITLE
 * @property string $MESSAGE
 * @property string $DATE_CREATE
 * @property string $DATE_VIEW
 * @property string $MESSAGE_TYPE
 * @property string $FROM_DELETED
 * @property string $TO_DELETED
 * @property string $SEND_MAIL
 * @property string $EMAIL_TEMPLATE
 * @property string $IS_LOG
 */
class BSonetMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FROM_USER_ID', 'TO_USER_ID', 'DATE_CREATE'], 'required'],
            [['FROM_USER_ID', 'TO_USER_ID'], 'integer'],
            [['MESSAGE'], 'string'],
            [['DATE_CREATE', 'DATE_VIEW'], 'safe'],
            [['TITLE', 'EMAIL_TEMPLATE'], 'string', 'max' => 250],
            [['MESSAGE_TYPE', 'FROM_DELETED', 'TO_DELETED', 'SEND_MAIL', 'IS_LOG'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FROM_USER_ID' => Yii::t('app', 'From  User '),
            'TO_USER_ID' => Yii::t('app', 'To  User '),
            'TITLE' => Yii::t('app', 'Title'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_VIEW' => Yii::t('app', 'Date  View'),
            'MESSAGE_TYPE' => Yii::t('app', 'Message  Type'),
            'FROM_DELETED' => Yii::t('app', 'From  Deleted'),
            'TO_DELETED' => Yii::t('app', 'To  Deleted'),
            'SEND_MAIL' => Yii::t('app', 'Send  Mail'),
            'EMAIL_TEMPLATE' => Yii::t('app', 'Email  Template'),
            'IS_LOG' => Yii::t('app', 'Is  Log'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
