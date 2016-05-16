<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_attempt".
 *
 * @property string $ID
 * @property integer $TEST_ID
 * @property integer $STUDENT_ID
 * @property string $DATE_START
 * @property string $DATE_END
 * @property string $STATUS
 * @property string $COMPLETED
 * @property integer $SCORE
 * @property integer $MAX_SCORE
 * @property integer $QUESTIONS
 */
class BLearnAttempt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_attempt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TEST_ID', 'STUDENT_ID', 'DATE_START'], 'required'],
            [['TEST_ID', 'STUDENT_ID', 'SCORE', 'MAX_SCORE', 'QUESTIONS'], 'integer'],
            [['DATE_START', 'DATE_END'], 'safe'],
            [['STATUS', 'COMPLETED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TEST_ID' => Yii::t('app', 'Test '),
            'STUDENT_ID' => Yii::t('app', 'Student '),
            'DATE_START' => Yii::t('app', 'Date  Start'),
            'DATE_END' => Yii::t('app', 'Date  End'),
            'STATUS' => Yii::t('app', 'Status'),
            'COMPLETED' => Yii::t('app', 'Completed'),
            'SCORE' => Yii::t('app', 'Score'),
            'MAX_SCORE' => Yii::t('app', 'Max  Score'),
            'QUESTIONS' => Yii::t('app', 'Questions'),
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
