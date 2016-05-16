<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_answer".
 *
 * @property string $ID
 * @property string $QUESTION_ID
 * @property integer $SORT
 * @property string $ANSWER
 * @property string $CORRECT
 * @property string $FEEDBACK
 * @property string $MATCH_ANSWER
 */
class BLearnAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['QUESTION_ID', 'ANSWER', 'CORRECT'], 'required'],
            [['QUESTION_ID', 'SORT'], 'integer'],
            [['ANSWER', 'FEEDBACK', 'MATCH_ANSWER'], 'string'],
            [['CORRECT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'QUESTION_ID' => Yii::t('app', 'Question '),
            'SORT' => Yii::t('app', 'Sort'),
            'ANSWER' => Yii::t('app', 'Answer'),
            'CORRECT' => Yii::t('app', 'Correct'),
            'FEEDBACK' => Yii::t('app', 'Feedback'),
            'MATCH_ANSWER' => Yii::t('app', 'Match  Answer'),
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
