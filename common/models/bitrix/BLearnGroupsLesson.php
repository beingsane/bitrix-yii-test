<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_groups_lesson".
 *
 * @property integer $LEARNING_GROUP_ID
 * @property integer $LESSON_ID
 * @property integer $DELAY
 */
class BLearnGroupsLesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_groups_lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LEARNING_GROUP_ID', 'LESSON_ID'], 'required'],
            [['LEARNING_GROUP_ID', 'LESSON_ID', 'DELAY'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LEARNING_GROUP_ID' => Yii::t('app', 'Learning  Group '),
            'LESSON_ID' => Yii::t('app', 'Lesson '),
            'DELAY' => Yii::t('app', 'Delay'),
        ];
    }

    public function getName()
    {
        return $this->LEARNING_GROUP_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LEARNING_GROUP_ID', 'LEARNING_GROUP_ID');
        return $list;
    }
}
