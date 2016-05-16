<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_event_answer".
 *
 * @property integer $ID
 * @property integer $EVENT_QUESTION_ID
 * @property integer $ANSWER_ID
 * @property string $MESSAGE
 */
class BVoteEventAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_event_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_QUESTION_ID', 'ANSWER_ID'], 'integer'],
            [['MESSAGE'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'EVENT_QUESTION_ID' => Yii::t('app', 'Event  Question '),
            'ANSWER_ID' => Yii::t('app', 'Answer '),
            'MESSAGE' => Yii::t('app', 'Message'),
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
