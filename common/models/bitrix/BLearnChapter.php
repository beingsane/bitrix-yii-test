<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_chapter".
 *
 * @property string $ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property string $COURSE_ID
 * @property integer $CHAPTER_ID
 * @property string $NAME
 * @property string $CODE
 * @property integer $SORT
 * @property integer $PREVIEW_PICTURE
 * @property string $PREVIEW_TEXT
 * @property string $PREVIEW_TEXT_TYPE
 * @property integer $DETAIL_PICTURE
 * @property string $DETAIL_TEXT
 * @property string $DETAIL_TEXT_TYPE
 * @property integer $JOURNAL_STATUS
 */
class BLearnChapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'COURSE_ID', 'NAME'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['COURSE_ID', 'CHAPTER_ID', 'SORT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'JOURNAL_STATUS'], 'integer'],
            [['PREVIEW_TEXT', 'DETAIL_TEXT'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 255],
            [['CODE'], 'string', 'max' => 50],
            [['PREVIEW_TEXT_TYPE', 'DETAIL_TEXT_TYPE'], 'string', 'max' => 4]
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
            'COURSE_ID' => Yii::t('app', 'Course '),
            'CHAPTER_ID' => Yii::t('app', 'Chapter '),
            'NAME' => Yii::t('app', 'Name'),
            'CODE' => Yii::t('app', 'Code'),
            'SORT' => Yii::t('app', 'Sort'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'DETAIL_TEXT' => Yii::t('app', 'Detail  Text'),
            'DETAIL_TEXT_TYPE' => Yii::t('app', 'Detail  Text  Type'),
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
