<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_test".
 *
 * @property integer $ID
 * @property integer $COURSE_ID
 * @property string $TIMESTAMP_X
 * @property integer $SORT
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property integer $ATTEMPT_LIMIT
 * @property integer $TIME_LIMIT
 * @property integer $COMPLETED_SCORE
 * @property string $QUESTIONS_FROM
 * @property integer $QUESTIONS_FROM_ID
 * @property integer $QUESTIONS_AMOUNT
 * @property string $RANDOM_QUESTIONS
 * @property string $RANDOM_ANSWERS
 * @property string $APPROVED
 * @property string $INCLUDE_SELF_TEST
 * @property string $PASSAGE_TYPE
 * @property integer $PREVIOUS_TEST_ID
 * @property integer $PREVIOUS_TEST_SCORE
 * @property string $INCORRECT_CONTROL
 * @property integer $CURRENT_INDICATION
 * @property integer $FINAL_INDICATION
 * @property integer $MIN_TIME_BETWEEN_ATTEMPTS
 * @property string $SHOW_ERRORS
 * @property string $NEXT_QUESTION_ON_ERROR
 */
class BLearnTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COURSE_ID', 'TIMESTAMP_X', 'NAME'], 'required'],
            [['COURSE_ID', 'SORT', 'ATTEMPT_LIMIT', 'TIME_LIMIT', 'COMPLETED_SCORE', 'QUESTIONS_FROM_ID', 'QUESTIONS_AMOUNT', 'PREVIOUS_TEST_ID', 'PREVIOUS_TEST_SCORE', 'CURRENT_INDICATION', 'FINAL_INDICATION', 'MIN_TIME_BETWEEN_ATTEMPTS'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE', 'QUESTIONS_FROM', 'RANDOM_QUESTIONS', 'RANDOM_ANSWERS', 'APPROVED', 'INCLUDE_SELF_TEST', 'PASSAGE_TYPE', 'INCORRECT_CONTROL', 'SHOW_ERRORS', 'NEXT_QUESTION_ON_ERROR'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 255],
            [['DESCRIPTION_TYPE'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'COURSE_ID' => Yii::t('app', 'Course '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'ATTEMPT_LIMIT' => Yii::t('app', 'Attempt  Limit'),
            'TIME_LIMIT' => Yii::t('app', 'Time  Limit'),
            'COMPLETED_SCORE' => Yii::t('app', 'Completed  Score'),
            'QUESTIONS_FROM' => Yii::t('app', 'Questions  From'),
            'QUESTIONS_FROM_ID' => Yii::t('app', 'Questions  From '),
            'QUESTIONS_AMOUNT' => Yii::t('app', 'Questions  Amount'),
            'RANDOM_QUESTIONS' => Yii::t('app', 'Random  Questions'),
            'RANDOM_ANSWERS' => Yii::t('app', 'Random  Answers'),
            'APPROVED' => Yii::t('app', 'Approved'),
            'INCLUDE_SELF_TEST' => Yii::t('app', 'Include  Self  Test'),
            'PASSAGE_TYPE' => Yii::t('app', 'Passage  Type'),
            'PREVIOUS_TEST_ID' => Yii::t('app', 'Previous  Test '),
            'PREVIOUS_TEST_SCORE' => Yii::t('app', 'Previous  Test  Score'),
            'INCORRECT_CONTROL' => Yii::t('app', 'Incorrect  Control'),
            'CURRENT_INDICATION' => Yii::t('app', 'Current  Indication'),
            'FINAL_INDICATION' => Yii::t('app', 'Final  Indication'),
            'MIN_TIME_BETWEEN_ATTEMPTS' => Yii::t('app', 'Min  Time  Between  Attempts'),
            'SHOW_ERRORS' => Yii::t('app', 'Show  Errors'),
            'NEXT_QUESTION_ON_ERROR' => Yii::t('app', 'Next  Question  On  Error'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
