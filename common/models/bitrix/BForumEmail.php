<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_email".
 *
 * @property integer $ID
 * @property string $EMAIL_FORUM_ACTIVE
 * @property integer $FORUM_ID
 * @property integer $SOCNET_GROUP_ID
 * @property integer $MAIL_FILTER_ID
 * @property string $EMAIL
 * @property string $USE_EMAIL
 * @property string $EMAIL_GROUP
 * @property string $SUBJECT_SUF
 * @property string $USE_SUBJECT
 * @property string $URL_TEMPLATES_MESSAGE
 * @property string $NOT_MEMBER_POST
 */
class BForumEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'MAIL_FILTER_ID', 'EMAIL'], 'required'],
            [['FORUM_ID', 'SOCNET_GROUP_ID', 'MAIL_FILTER_ID'], 'integer'],
            [['EMAIL_FORUM_ACTIVE', 'USE_EMAIL', 'USE_SUBJECT', 'NOT_MEMBER_POST'], 'string', 'max' => 1],
            [['EMAIL', 'EMAIL_GROUP', 'URL_TEMPLATES_MESSAGE'], 'string', 'max' => 255],
            [['SUBJECT_SUF'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'EMAIL_FORUM_ACTIVE' => Yii::t('app', 'Email  Forum  Active'),
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
            'MAIL_FILTER_ID' => Yii::t('app', 'Mail  Filter '),
            'EMAIL' => Yii::t('app', 'Email'),
            'USE_EMAIL' => Yii::t('app', 'Use  Email'),
            'EMAIL_GROUP' => Yii::t('app', 'Email  Group'),
            'SUBJECT_SUF' => Yii::t('app', 'Subject  Suf'),
            'USE_SUBJECT' => Yii::t('app', 'Use  Subject'),
            'URL_TEMPLATES_MESSAGE' => Yii::t('app', 'Url  Templates  Message'),
            'NOT_MEMBER_POST' => Yii::t('app', 'Not  Member  Post'),
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
