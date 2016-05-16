<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_course".
 *
 * @property string $ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property string $CODE
 * @property string $NAME
 * @property integer $SORT
 * @property integer $PREVIEW_PICTURE
 * @property string $PREVIEW_TEXT
 * @property string $PREVIEW_TEXT_TYPE
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property string $RATING
 * @property string $RATING_TYPE
 * @property string $SCORM
 * @property integer $LINKED_LESSON_ID
 * @property integer $JOURNAL_STATUS
 */
class BLearnCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X', 'ACTIVE_FROM', 'ACTIVE_TO'], 'safe'],
            [['SORT', 'PREVIEW_PICTURE', 'LINKED_LESSON_ID', 'JOURNAL_STATUS'], 'integer'],
            [['PREVIEW_TEXT', 'DESCRIPTION'], 'string'],
            [['ACTIVE', 'RATING', 'SCORM'], 'string', 'max' => 1],
            [['CODE', 'RATING_TYPE'], 'string', 'max' => 50],
            [['NAME'], 'string', 'max' => 255],
            [['PREVIEW_TEXT_TYPE', 'DESCRIPTION_TYPE'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'SORT' => Yii::t('app', 'Sort'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'RATING' => Yii::t('app', 'Rating'),
            'RATING_TYPE' => Yii::t('app', 'Rating  Type'),
            'SCORM' => Yii::t('app', 'Scorm'),
            'LINKED_LESSON_ID' => Yii::t('app', 'Linked  Lesson '),
            'JOURNAL_STATUS' => Yii::t('app', 'Journal  Status'),
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
