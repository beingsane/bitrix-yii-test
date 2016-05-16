<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_user_topic".
 *
 * @property string $ID
 * @property integer $TOPIC_ID
 * @property integer $USER_ID
 * @property integer $FORUM_ID
 * @property string $LAST_VISIT
 */
class BForumUserTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_user_topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TOPIC_ID', 'USER_ID'], 'required'],
            [['TOPIC_ID', 'USER_ID', 'FORUM_ID'], 'integer'],
            [['LAST_VISIT'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TOPIC_ID' => Yii::t('app', 'Topic '),
            'USER_ID' => Yii::t('app', 'User '),
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'LAST_VISIT' => Yii::t('app', 'Last  Visit'),
        ];
    }

    public function getName()
    {
        return $this->TOPIC_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TOPIC_ID', 'TOPIC_ID');
        return $list;
    }
}
