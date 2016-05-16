<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_subscribe".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $FORUM_ID
 * @property integer $TOPIC_ID
 * @property string $START_DATE
 * @property integer $LAST_SEND
 * @property string $NEW_TOPIC_ONLY
 * @property string $SITE_ID
 * @property integer $SOCNET_GROUP_ID
 */
class BForumSubscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'FORUM_ID', 'START_DATE'], 'required'],
            [['USER_ID', 'FORUM_ID', 'TOPIC_ID', 'LAST_SEND', 'SOCNET_GROUP_ID'], 'integer'],
            [['START_DATE'], 'safe'],
            [['NEW_TOPIC_ONLY'], 'string', 'max' => 50],
            [['SITE_ID'], 'string', 'max' => 2],
            [['USER_ID', 'FORUM_ID', 'TOPIC_ID', 'SOCNET_GROUP_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'FORUM_ID', 'TOPIC_ID', 'SOCNET_GROUP_ID'], 'message' => 'The combination of User , Forum , Topic  and Socnet  Group  has already been taken.']
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
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'TOPIC_ID' => Yii::t('app', 'Topic '),
            'START_DATE' => Yii::t('app', 'Start  Date'),
            'LAST_SEND' => Yii::t('app', 'Last  Send'),
            'NEW_TOPIC_ONLY' => Yii::t('app', 'New  Topic  Only'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
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
