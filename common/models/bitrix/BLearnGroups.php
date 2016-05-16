<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_groups".
 *
 * @property string $ID
 * @property string $ACTIVE
 * @property string $TITLE
 * @property string $CODE
 * @property integer $SORT
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property integer $COURSE_LESSON_ID
 */
class BLearnGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'COURSE_LESSON_ID'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO'], 'safe'],
            [['COURSE_LESSON_ID'], 'required'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['TITLE'], 'string', 'max' => 255],
            [['CODE'], 'string', 'max' => 50]
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
            'TITLE' => Yii::t('app', 'Title'),
            'CODE' => Yii::t('app', 'Code'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'COURSE_LESSON_ID' => Yii::t('app', 'Course  Lesson '),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
