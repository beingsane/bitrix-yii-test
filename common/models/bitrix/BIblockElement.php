<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_element".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $IBLOCK_ID
 * @property integer $IBLOCK_SECTION_ID
 * @property string $ACTIVE
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property integer $SORT
 * @property string $NAME
 * @property integer $PREVIEW_PICTURE
 * @property string $PREVIEW_TEXT
 * @property string $PREVIEW_TEXT_TYPE
 * @property integer $DETAIL_PICTURE
 * @property string $DETAIL_TEXT
 * @property string $DETAIL_TEXT_TYPE
 * @property string $SEARCHABLE_CONTENT
 * @property integer $WF_STATUS_ID
 * @property integer $WF_PARENT_ELEMENT_ID
 * @property string $WF_NEW
 * @property integer $WF_LOCKED_BY
 * @property string $WF_DATE_LOCK
 * @property string $WF_COMMENTS
 * @property string $IN_SECTIONS
 * @property string $XML_ID
 * @property string $CODE
 * @property string $TAGS
 * @property string $TMP_ID
 * @property integer $WF_LAST_HISTORY_ID
 * @property integer $SHOW_COUNTER
 * @property string $SHOW_COUNTER_START
 */
class BIblockElement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_CREATE', 'ACTIVE_FROM', 'ACTIVE_TO', 'WF_DATE_LOCK', 'SHOW_COUNTER_START'], 'safe'],
            [['MODIFIED_BY', 'CREATED_BY', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'SORT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'WF_STATUS_ID', 'WF_PARENT_ELEMENT_ID', 'WF_LOCKED_BY', 'WF_LAST_HISTORY_ID', 'SHOW_COUNTER'], 'integer'],
            [['NAME'], 'required'],
            [['PREVIEW_TEXT', 'DETAIL_TEXT', 'SEARCHABLE_CONTENT', 'WF_COMMENTS'], 'string'],
            [['ACTIVE', 'WF_NEW', 'IN_SECTIONS'], 'string', 'max' => 1],
            [['NAME', 'XML_ID', 'CODE', 'TAGS'], 'string', 'max' => 255],
            [['PREVIEW_TEXT_TYPE', 'DETAIL_TEXT_TYPE'], 'string', 'max' => 4],
            [['TMP_ID'], 'string', 'max' => 40]
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
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'IBLOCK_SECTION_ID' => Yii::t('app', 'Iblock  Section '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'DETAIL_TEXT' => Yii::t('app', 'Detail  Text'),
            'DETAIL_TEXT_TYPE' => Yii::t('app', 'Detail  Text  Type'),
            'SEARCHABLE_CONTENT' => Yii::t('app', 'Searchable  Content'),
            'WF_STATUS_ID' => Yii::t('app', 'Wf  Status '),
            'WF_PARENT_ELEMENT_ID' => Yii::t('app', 'Wf  Parent  Element '),
            'WF_NEW' => Yii::t('app', 'Wf  New'),
            'WF_LOCKED_BY' => Yii::t('app', 'Wf  Locked  By'),
            'WF_DATE_LOCK' => Yii::t('app', 'Wf  Date  Lock'),
            'WF_COMMENTS' => Yii::t('app', 'Wf  Comments'),
            'IN_SECTIONS' => Yii::t('app', 'In  Sections'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'CODE' => Yii::t('app', 'Code'),
            'TAGS' => Yii::t('app', 'Tags'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'WF_LAST_HISTORY_ID' => Yii::t('app', 'Wf  Last  History '),
            'SHOW_COUNTER' => Yii::t('app', 'Show  Counter'),
            'SHOW_COUNTER_START' => Yii::t('app', 'Show  Counter  Start'),
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
