<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_publish_prohibition".
 *
 * @property string $COURSE_LESSON_ID
 * @property string $PROHIBITED_LESSON_ID
 */
class BLearnPublishProhibition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_publish_prohibition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COURSE_LESSON_ID', 'PROHIBITED_LESSON_ID'], 'required'],
            [['COURSE_LESSON_ID', 'PROHIBITED_LESSON_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COURSE_LESSON_ID' => Yii::t('app', 'Course  Lesson '),
            'PROHIBITED_LESSON_ID' => Yii::t('app', 'Prohibited  Lesson '),
        ];
    }

    public function getName()
    {
        return $this->COURSE_LESSON_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'COURSE_LESSON_ID', 'COURSE_LESSON_ID');
        return $list;
    }
}
