<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_file".
 *
 * @property integer $ID
 * @property integer $FORUM_ID
 * @property integer $TOPIC_ID
 * @property integer $MESSAGE_ID
 * @property integer $FILE_ID
 * @property integer $USER_ID
 * @property string $TIMESTAMP_X
 * @property integer $HITS
 */
class BForumFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'TOPIC_ID', 'MESSAGE_ID', 'FILE_ID', 'USER_ID', 'HITS'], 'integer'],
            [['FILE_ID', 'TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'TOPIC_ID' => Yii::t('app', 'Topic '),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'FILE_ID' => Yii::t('app', 'File '),
            'USER_ID' => Yii::t('app', 'User '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'HITS' => Yii::t('app', 'Hits'),
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
