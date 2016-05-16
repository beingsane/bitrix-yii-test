<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_test_result".
 *
 * @property string $ID
 * @property string $ATTEMPT_ID
 * @property integer $QUESTION_ID
 * @property string $RESPONSE
 * @property integer $POINT
 * @property string $CORRECT
 * @property string $ANSWERED
 */
class BLearnTestResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_test_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ATTEMPT_ID', 'QUESTION_ID'], 'required'],
            [['ATTEMPT_ID', 'QUESTION_ID', 'POINT'], 'integer'],
            [['RESPONSE'], 'string'],
            [['CORRECT', 'ANSWERED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ATTEMPT_ID' => Yii::t('app', 'Attempt '),
            'QUESTION_ID' => Yii::t('app', 'Question '),
            'RESPONSE' => Yii::t('app', 'Response'),
            'POINT' => Yii::t('app', 'Point'),
            'CORRECT' => Yii::t('app', 'Correct'),
            'ANSWERED' => Yii::t('app', 'Answered'),
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
