<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_gradebook".
 *
 * @property string $ID
 * @property integer $STUDENT_ID
 * @property integer $TEST_ID
 * @property integer $RESULT
 * @property integer $MAX_RESULT
 * @property integer $ATTEMPTS
 * @property string $COMPLETED
 * @property integer $EXTRA_ATTEMPTS
 */
class BLearnGradebook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_gradebook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STUDENT_ID', 'TEST_ID'], 'required'],
            [['STUDENT_ID', 'TEST_ID', 'RESULT', 'MAX_RESULT', 'ATTEMPTS', 'EXTRA_ATTEMPTS'], 'integer'],
            [['COMPLETED'], 'string', 'max' => 1],
            [['STUDENT_ID', 'TEST_ID'], 'unique', 'targetAttribute' => ['STUDENT_ID', 'TEST_ID'], 'message' => 'The combination of Student  and Test  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STUDENT_ID' => Yii::t('app', 'Student '),
            'TEST_ID' => Yii::t('app', 'Test '),
            'RESULT' => Yii::t('app', 'Result'),
            'MAX_RESULT' => Yii::t('app', 'Max  Result'),
            'ATTEMPTS' => Yii::t('app', 'Attempts'),
            'COMPLETED' => Yii::t('app', 'Completed'),
            'EXTRA_ATTEMPTS' => Yii::t('app', 'Extra  Attempts'),
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
