<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_rights".
 *
 * @property string $LESSON_ID
 * @property string $SUBJECT_ID
 * @property integer $TASK_ID
 */
class BLearnRights extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_rights';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LESSON_ID', 'SUBJECT_ID', 'TASK_ID'], 'required'],
            [['LESSON_ID', 'TASK_ID'], 'integer'],
            [['SUBJECT_ID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LESSON_ID' => Yii::t('app', 'Lesson '),
            'SUBJECT_ID' => Yii::t('app', 'Subject '),
            'TASK_ID' => Yii::t('app', 'Task '),
        ];
    }

    public function getName()
    {
        return $this->LESSON_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LESSON_ID', 'LESSON_ID');
        return $list;
    }
}
