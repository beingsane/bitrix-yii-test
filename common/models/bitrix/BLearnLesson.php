<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_lesson".
 *
 * @property string $ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property string $ACTIVE
 * @property string $COURSE_ID
 * @property string $CHAPTER_ID
 * @property string $NAME
 * @property integer $SORT
 * @property integer $PREVIEW_PICTURE
 * @property string $KEYWORDS
 * @property string $PREVIEW_TEXT
 * @property string $PREVIEW_TEXT_TYPE
 * @property integer $DETAIL_PICTURE
 * @property string $DETAIL_TEXT
 * @property string $DETAIL_TEXT_TYPE
 * @property string $LAUNCH
 * @property string $CODE
 * @property integer $WAS_CHAPTER_ID
 * @property integer $WAS_PARENT_CHAPTER_ID
 * @property integer $WAS_PARENT_COURSE_ID
 * @property integer $WAS_COURSE_ID
 * @property integer $JOURNAL_STATUS
 */
class BLearnLesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'KEYWORDS'], 'required'],
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['CREATED_BY', 'COURSE_ID', 'CHAPTER_ID', 'SORT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'WAS_CHAPTER_ID', 'WAS_PARENT_CHAPTER_ID', 'WAS_PARENT_COURSE_ID', 'WAS_COURSE_ID', 'JOURNAL_STATUS'], 'integer'],
            [['KEYWORDS', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'LAUNCH'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 255],
            [['PREVIEW_TEXT_TYPE', 'DETAIL_TEXT_TYPE'], 'string', 'max' => 4],
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
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'COURSE_ID' => Yii::t('app', 'Course '),
            'CHAPTER_ID' => Yii::t('app', 'Chapter '),
            'NAME' => Yii::t('app', 'Name'),
            'SORT' => Yii::t('app', 'Sort'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'DETAIL_TEXT' => Yii::t('app', 'Detail  Text'),
            'DETAIL_TEXT_TYPE' => Yii::t('app', 'Detail  Text  Type'),
            'LAUNCH' => Yii::t('app', 'Launch'),
            'CODE' => Yii::t('app', 'Code'),
            'WAS_CHAPTER_ID' => Yii::t('app', 'Was  Chapter '),
            'WAS_PARENT_CHAPTER_ID' => Yii::t('app', 'Was  Parent  Chapter '),
            'WAS_PARENT_COURSE_ID' => Yii::t('app', 'Was  Parent  Course '),
            'WAS_COURSE_ID' => Yii::t('app', 'Was  Course '),
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
