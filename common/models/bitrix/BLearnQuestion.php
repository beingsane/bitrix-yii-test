<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_question".
 *
 * @property string $ID
 * @property string $ACTIVE
 * @property string $TIMESTAMP_X
 * @property string $LESSON_ID
 * @property string $QUESTION_TYPE
 * @property string $NAME
 * @property integer $SORT
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property string $COMMENT_TEXT
 * @property integer $FILE_ID
 * @property string $SELF
 * @property integer $POINT
 * @property string $DIRECTION
 * @property string $CORRECT_REQUIRED
 * @property string $EMAIL_ANSWER
 * @property string $INCORRECT_MESSAGE
 */
class BLearnQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'LESSON_ID', 'NAME'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['LESSON_ID', 'SORT', 'FILE_ID', 'POINT'], 'integer'],
            [['DESCRIPTION', 'COMMENT_TEXT', 'INCORRECT_MESSAGE'], 'string'],
            [['ACTIVE', 'QUESTION_TYPE', 'SELF', 'DIRECTION', 'CORRECT_REQUIRED', 'EMAIL_ANSWER'], 'string', 'max' => 1],
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
            'ACTIVE' => Yii::t('app', 'Active'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'LESSON_ID' => Yii::t('app', 'Lesson '),
            'QUESTION_TYPE' => Yii::t('app', 'Question  Type'),
            'NAME' => Yii::t('app', 'Name'),
            'SORT' => Yii::t('app', 'Sort'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'COMMENT_TEXT' => Yii::t('app', 'Comment  Text'),
            'FILE_ID' => Yii::t('app', 'File '),
            'SELF' => Yii::t('app', 'Self'),
            'POINT' => Yii::t('app', 'Point'),
            'DIRECTION' => Yii::t('app', 'Direction'),
            'CORRECT_REQUIRED' => Yii::t('app', 'Correct  Required'),
            'EMAIL_ANSWER' => Yii::t('app', 'Email  Answer'),
            'INCORRECT_MESSAGE' => Yii::t('app', 'Incorrect  Message'),
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
